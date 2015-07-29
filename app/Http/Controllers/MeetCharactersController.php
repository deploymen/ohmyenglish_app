<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\MeetCharacters;
use Exception;
use Request;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

Class MeetCharactersController extends Controller {

	public function edit() {

        try {
        	$id =  Request::input("id" , '1');
     	 	$name = Request::input("name");
            $desc_en = Request::input("desc_en");
     	 	$desc_ms = Request::input("desc_ms");
            $uploadPath = './assets/images/home/uploads/';
   
            $meetCharacters = MeetCharacters::find($id);

            $slug = str_slug($name, "-");

            $thumbPath = $uploadPath . $meetCharacters->filename . '.png';
            $newThumbPath = $uploadPath . $slug . '.png';
            if (file_exists($thumbPath)) {
                rename($thumbPath, $newThumbPath);
            }

            $storage = new FileSystem($uploadPath, true);

            $thumb = new File('charThumb', $storage);
            if (intval($thumb->getSize())) {
                $thumb->setName($slug);
                $thumb->addValidations(array(
                    new Mimetype('image/png'),
                    new Size('1M'),
                ));
                $thumb->upload();
            }
            
            $meetCharacters->name = $name;
            $meetCharacters->filename = $slug;
            $meetCharacters->desc_en = $desc_en;
            $meetCharacters->desc_ms = $desc_ms;
            $meetCharacters->save();

        } catch (Exception $ex) {
            // Fail!
            die($ex->getMessage());
        }

        return redirect('/admin/home/meet-characters');
	}

}
