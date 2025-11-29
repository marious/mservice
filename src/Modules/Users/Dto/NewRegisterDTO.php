<?php

namespace Modules\Users\Dto;

use Illuminate\Http\UploadedFile;

class NewRegisterDTO
{
    public function __construct(
        public readonly string       $phone,
        public readonly string       $nationalId,
        public readonly UploadedFile $personalImg,
        public readonly UploadedFile $dobImg,
        public readonly UploadedFile $graduationCertificateImg,
        public readonly UploadedFile $internshipCertificateImg,
        public readonly UploadedFile $syndicateRegistrationFormImg,
        public readonly UploadedFile $practiceLicenseFormImg,
        public readonly UploadedFile $practiceExamResultImg,
        public readonly UploadedFile $criminalRecordCertificateImg,
        public readonly UploadedFile $militaryServiceStatus,
    )
    {
    }

    public static function fromRequest($request): self
    {
        return new self(
            $request->input('phone'),
            $request->input('national_id'),
            $request->file('personal_image'),
            $request->file('dob_image'),
            $request->file('graduation_certificate_image'),
            $request->file('internship_certificate_image'),
            $request->file('syndicate_registration_form_image'),
            $request->file('practice_license_form_image'),
            $request->file('practice_exam_result_image'),
            $request->file('criminal_record_certificate_image'),
            $request->file('military_service_status_image'),
        );
    }

    public function getDocuments(): array
    {
        return [
            'personal_image' => $this->personalImg,
            'dob_image' => $this->dobImg,
            'graduation_certificate_image' => $this->graduationCertificateImg,
            'internship_certificate_image' => $this->internshipCertificateImg,
            'syndicate_registration_form_image' => $this->syndicateRegistrationFormImg,
            'practice_license_form_image' => $this->practiceLicenseFormImg,
            'practice_exam_result_image' => $this->practiceExamResultImg,
            'criminal_record_certificate_image' => $this->criminalRecordCertificateImg,
            'military_service_status_image' => $this->militaryServiceStatus,
        ];
    }
}
