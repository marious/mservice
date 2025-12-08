<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Blog\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $items = json_decode(file_get_contents(database_path('seeders/data/blogs.json')), true);
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $content = 'Lorem ipsum odor amet, consectetuer adipiscing elit. Est mauris dictum massa semper ad sem leo. Viverra leo proin posuere; enim nulla porta ultrices consectetur. Euismod sagittis natoque duis integer eros enim. Egestas fermentum torquent varius fermentum dolor. Urna volutpat tempor blandit rhoncus; faucibus semper justo arcu. Purus augue himenaeos blandit senectus laoreet suspendisse vivamus. Tellus dignissim aliquet pellentesque nascetur hendrerit curae primis fames.

Tristique penatibus auctor mi; morbi ac torquent. Enim class finibus mauris, iaculis hendrerit convallis. Habitasse inceptos ut penatibus taciti iaculis. Faucibus tellus senectus volutpat ornare id lacinia condimentum tristique. Ornare conubia vitae eleifend varius proin iaculis at. Cras primis nullam gravida fames ligula. Luctus interdum ultricies purus fames interdum id molestie. Montes luctus fusce orci etiam vitae per. Morbi potenti non dapibus morbi elit, dictumst mauris diam.

Egestas quis cursus placerat, pellentesque cursus maecenas magna ligula. Id dictumst mollis condimentum vivamus interdum natoque arcu in. Nulla sem orci suspendisse, ante tristique blandit fusce iaculis. Facilisi auctor rhoncus odio velit fames metus sociosqu. Ante sociosqu magnis volutpat tempor enim curae lacinia. Ultricies ut rutrum dolor tellus at molestie odio sagittis faucibus. Platea himenaeos hac mauris tristique suscipit praesent netus a. Quam arcu platea litora nec primis fermentum leo. Maecenas montes dignissim phasellus vehicula lobortis; non ligula.

Curae augue gravida cursus laoreet amet vitae. Magna libero aenean bibendum maximus aliquam dignissim aliquet. Himenaeos ridiculus aptent sem habitasse consectetur eu quis molestie nisi. Leo fermentum suscipit primis rutrum suspendisse nunc purus. Imperdiet vehicula ultrices taciti sodales aliquam bibendum? Auctor tortor condimentum dui egestas pretium orci. Dis nibh vestibulum suspendisse proin curabitur fames. Sodales commodo interdum augue nostra interdum ante curabitur efficitur. Natoque morbi semper hendrerit pulvinar nascetur viverra gravida dui. Rhoncus tristique pellentesque faucibus convallis pharetra ante nisl efficitur.

Est commodo auctor parturient dignissim rutrum. Massa aptent sociosqu placerat; nunc ad commodo ligula. Potenti molestie cras eget fusce pharetra placerat. Aliquam eget mauris parturient ut nibh imperdiet odio torquent. Eleifend parturient sapien mollis duis, nisl conubia phasellus orci integer. Vivamus proin phasellus pellentesque mauris, rhoncus tincidunt. Sit posuere dapibus diam adipiscing tempor sed nascetur. Nam feugiat bibendum risus leo ac potenti est mi.

Aliquam maecenas tristique mollis, justo diam dui facilisi. Elit enim consectetur lobortis magna tempor tempus. Sem turpis nunc consequat lectus sem suspendisse. Odio dis venenatis et sollicitudin in tempus felis. Sollicitudin amet curabitur molestie vel iaculis fermentum. Class molestie lectus pellentesque litora hendrerit. Volutpat suspendisse tempus quam sodales ultricies tristique. In arcu lectus a laoreet consequat velit. Tristique scelerisque fusce vestibulum lobortis sollicitudin ultricies. Aptent per sit condimentum porta nam mauris.

Vestibulum ullamcorper interdum porttitor tortor at. Fames rutrum proin ligula velit pellentesque. Lectus finibus libero cubilia nec aliquet urna. Vivamus volutpat aptent condimentum vulputate id blandit. Nisi sit taciti magna vivamus; efficitur id aptent. Nisi sem auctor mi dictum montes nam imperdiet. Venenatis vivamus duis tortor lorem, senectus ultricies semper.

Montes ullamcorper nisi cras euismod integer; molestie et dui eget. Ornare metus senectus et non adipiscing lacus blandit. Viverra mi tristique condimentum ac inceptos etiam parturient consectetur. Cubilia augue penatibus quam mauris molestie litora eleifend netus. Parturient ultrices laoreet duis est nostra class. Sagittis quisque ullamcorper fringilla metus efficitur blandit nulla. Ligula amet duis facilisis aliquam; massa dapibus vitae.

Cursus dui libero inceptos morbi convallis praesent sodales. Natoque hac commodo habitant tincidunt tincidunt facilisis; ipsum lacus. Conubia quam consequat auctor erat tincidunt. Fringilla sociosqu semper imperdiet; augue neque consequat. Ornare rhoncus conubia augue neque litora nibh maximus. Metus per justo aliquam hac odio varius eu libero quis.

Quam proin ultricies semper lobortis bibendum mattis. Orci suspendisse consequat, torquent eget vitae platea quis. Facilisis lectus potenti fusce pretium congue? Bibendum a placerat netus suscipit amet mi. Sollicitudin semper integer integer elementum ad elementum commodo. Class sem orci ante praesent in lobortis. Curae duis massa non purus fusce nascetur.

Potenti purus platea netus at ex aliquam ipsum. Pulvinar turpis felis quisque sapien phasellus semper metus nibh. Convallis viverra phasellus neque himenaeos litora posuere. Magna purus ipsum lacinia tellus quisque? Tortor potenti placerat dis conubia maximus curabitur cras tincidunt? Dignissim erat blandit eleifend, mi mi sodales tortor purus ante. Orci primis nam varius dis pharetra ut ante? Facilisis ut ac vel lorem tincidunt consequat quisque sagittis. Consectetur senectus neque tincidunt parturient lobortis sagittis dis.

Iaculis gravida adipiscing tempus; vel hendrerit cubilia egestas ornare velit. Volutpat aptent nulla condimentum cubilia commodo consequat leo. Class magnis mus augue tempus mattis scelerisque eget aliquet. Per sociosqu est maecenas; eu curae vestibulum praesent bibendum. Habitant nullam orci cubilia hendrerit ac condimentum egestas. Hendrerit fusce finibus orci montes odio orci dictum iaculis lacinia. Nibh himenaeos dui facilisis consequat arcu.

Primis consectetur scelerisque maecenas sapien luctus vehicula fames. Morbi rutrum vivamus maximus morbi dapibus primis finibus? Commodo mattis malesuada vitae tristique est dis taciti ut. Ultricies dolor etiam metus magna integer sodales sit efficitur adipiscing. Sodales cubilia eros posuere urna sem. Rhoncus elit mus hac volutpat gravida aenean magna. Venenatis tellus parturient feugiat ipsum vel nunc lectus nam.

Urna euismod habitant nunc nibh maecenas praesent potenti inceptos nostra. Lobortis neque fringilla conubia netus cursus iaculis non. Ad convallis fermentum at cursus; elementum metus tincidunt nec. Accumsan condimentum imperdiet hendrerit dui nam lobortis. Interdum natoque penatibus ligula justo etiam cubilia quam convallis lobortis. Ridiculus habitasse mollis fames maecenas facilisi sagittis pellentesque massa. Maximus commodo eget nibh nec velit interdum facilisis. Maecenas risus adipiscing malesuada pellentesque ipsum justo venenatis.

Consequat vulputate vivamus molestie urna placerat. Fames mauris proin phasellus est erat quisque ultricies taciti. Cursus mi est habitant dis vivamus lacinia. Amet maecenas conubia rutrum finibus sed sagittis, sed conubia curabitur? Et feugiat suscipit a; quisque parturient dolor cubilia suspendisse. Pharetra ornare sodales iaculis amet tempor vel platea facilisis. Erat risus cras sem arcu odio sed.

Consequat scelerisque ligula, donec duis blandit nisl. Posuere phasellus ridiculus diam metus, enim est torquent. Imperdiet nibh duis vestibulum sociosqu scelerisque. Bibendum conubia eleifend egestas maecenas pharetra habitant nullam pellentesque cras. Tristique efficitur dapibus fusce posuere consectetur. Amet litora duis euismod pretium urna vehicula a neque. Dapibus dapibus sollicitudin nascetur aliquam mollis sagittis.

Phasellus nec platea enim habitasse curae. Porttitor nam erat cubilia iaculis iaculis augue torquent mi. Laoreet enim ligula auctor viverra quisque duis eu. Felis velit eleifend dui ex est nisl velit aptent mauris. Fames primis cursus sapien tempus auctor sagittis non. Accumsan faucibus dictumst tincidunt varius semper tincidunt dis mollis. Pharetra semper consequat dictum turpis tortor diam, ultrices massa donec. Maecenas velit lobortis nisi aptent vestibulum facilisi posuere habitant.

Tristique bibendum facilisis porttitor dictumst pulvinar mauris. Eros metus sapien blandit sapien felis; parturient a. Malesuada ultricies libero habitasse arcu venenatis. Pellentesque odio odio mus facilisis egestas volutpat vulputate nostra nascetur. Magna ultricies cubilia commodo; laoreet conubia ut. Lorem eleifend platea felis himenaeos et taciti proin. Eu ut eros ante fusce risus conubia cras. Venenatis auctor elit natoque penatibus aliquet donec mauris ultricies. In natoque facilisi ad molestie aptent maximus. Condimentum dignissim pretium rutrum dolor neque malesuada dolor.

Fermentum senectus nascetur dapibus arcu felis mollis potenti. Massa pulvinar tempus nisi nulla sed. Elementum arcu porta, aptent mus ligula in odio. Quam pulvinar adipiscing et, risus aptent conubia. Suscipit turpis tellus suscipit, cubilia mauris habitasse vivamus. Sollicitudin mus hac dictum potenti, suspendisse vivamus vel montes mattis. Sodales feugiat dolor et porta nibh elit. Curae cursus malesuada; et massa commodo tempus orci sem.

Convallis non mi dictum consequat scelerisque aptent. Non libero mauris dictumst lacus rutrum tristique. Parturient placerat mi massa posuere consequat elit. Per montes nostra lacinia ligula mollis. Molestie lorem natoque quis vitae pellentesque arcu. Parturient vel ornare scelerisque taciti ipsum etiam. Ullamcorper blandit quam feugiat pharetra eget tempor gravida. Per purus metus suspendisse ultricies enim turpis mus dis. Quam augue eros efficitur erat tempus dolor finibus felis leo. Turpis feugiat tellus id felis proin maecenas posuere congue.';
        foreach ($items as $k => $item) {
            $model = new Blog();

            // Set translatable attributes
            $model->setTranslation('title', 'en', $item['title_en']);
            $model->setTranslation('title', 'ar', $item['title_ar']);
            $model->setTranslation('slug', 'en', $item['slug_en'] . '-' . $k);
            $model->setTranslation('slug', 'ar', $item['slug_ar'] . '-' . $k);

            // Set translatable description
            $model->setTranslation('description', 'en', $description);
            $model->setTranslation('description', 'ar', $item['content']);

            $model->setTranslation('content', 'en', $content);
            $model->setTranslation('content', 'ar', $item['content'] . ' ' . $item['content'] . ' ' . $item['content'] . ' '. $item['content'] . ' ' . $item['content']);

            // Set non-translatable attributes
            $model->is_published = $item['is_published'] ?? true;
//            $model->user_id = 1; // Replace with appropriate user_id

            $model->save();
        }
    }
}
