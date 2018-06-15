<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post = DB::table('users')->join('posts','users.id','=','posts.user_id')->orderby('posts.id', 'DESC')->paginate(6);
      $user = User::get();
      //dd($post);
      return view('index',compact('post','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $user = User::get();
        return view('create',compact('user'));
    }
    public function create(Request $request)
    {
      DB::beginTransaction();

        try {
          $data = Post::create($request->all());
        } catch (ValidationException $e) {
            DB::rollback();
        }
        DB::commit();

        return $data;
    }


    public function update(Request $request)
    {
        $data=Post::find($request->id);
        $data->title = $request->title;
        $data->text= $request->text;
        $data->img_src =  $request->img_src;
        $data->user_id = $request->user_id;
        $data->fecha = $request->fecha;
        $data->save();
        return $data;
    }

    public function destroy(Request $request)
    {
      $data=Post::destroy($request->id);
      return $request;
    }
    public function upload(Request $request){

        DB::beginTransaction();
        try{

            $data = $request->all();
            foreach ($data["file"] as $file) {

                $attr = exif_read_data($file);
                $filename_img = $file->getClientOriginalName();
                $mime = $file->getMimeType();

                if (($mime == 'image/jpeg') || ($mime == 'image/jpg' ) || ($mime == 'image/png')) {

                    $destinationPath = public_path() . '/images';
                    $filename_img = $file->getClientOriginalName();
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true);
                    }
                    $destinationPath1 = $destinationPath . '/' . $filename_img;

                    copy($file, $destinationPath1);
                } else {
                    return "Tipo de archivo invalido mime: " . $mime;
                    abort(500);
                }
            }
        }catch (\Exception $e){
            DB::rollBack();
            return $e;
        }
        DB::commit();
    }
}
