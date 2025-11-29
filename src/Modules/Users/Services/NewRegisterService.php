<?php

namespace Modules\Users\Services;

use Modules\Users\Dto\NewRegisterDTO;
use Modules\Users\Models\RegistrationRequest;

class NewRegisterService
{
    public function register(NewRegisterDTO $dto)
    {
        $registerRequest = RegistrationRequest::create([
            'phone' => $dto->phone,
            'national_id' => $dto->nationalId,
            'active' => false,
            'reg_code' => 'EMS' . random_int(11111, 99999),
        ]);

        $documents = $this->uploadDocuments($registerRequest->id, $dto->getDocuments());

        return $registerRequest->fresh();
    }

    private function uploadDocuments(int $id, array $documents): array
    {
        $uploadedPaths = [];
        foreach ($documents as $key => $file) {
            $filename = time() . "_{$key}_" . $file->getClientOriginalName();
            $path = $file->storeAs("documents/{$id}", $filename, 'public');
            $uploadedPaths[$key] = $path;
        }
        return $uploadedPaths;
    }
}