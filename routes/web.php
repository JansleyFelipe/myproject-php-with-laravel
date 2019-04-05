<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/contact', function () {
//     return "Hi about page";
// });

// Route::get('/post/{id}/{name}', function($id, $name){

//     return "This is post number " . $id . $name;
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function(){

//     $url = route('admin.home');

//     return "This url is " . $url;

// }));

// Route::get('/post/{id}', 'PostsController@index');

Route::resource('posts', 'PostsController', ['only' => ['create', 'store']]);
Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}/{passwd}', 'PostsController@show_post');



/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){

//     DB::insert('insert into posts(title, content) values(?, ?)', ['teste', 'Laravel is a test']);

// });

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id=?', [1]);

//     foreach($results as $post){

//     return $post->content;

//     }
// });

// Route::get('/update', function(){

//     $updated = DB::update('update posts set title="PHP" where id=?', [4]);

//     return $updated;

// });

// Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id=?', [1]);

//     return $deleted;

// });


/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

//SELECT * FROM 'table';

// Route::get('/read', function(){

//     $posts = Post::all();


//     foreach($posts as $post){

//         return $post->title;

//     }

// });

//Try to find the data by id

// Route::get('/find', function(){

//     $post = Post::find(2);


//     return $post->content;
// });

// Filtro utilizando where, ordenando pelo id de forma crescente, trazendo apenas 3 linhas de dados e enfim o ultimo elemento traz até o código

// Route::get('/findwhere', function(){

//     $posts = Post::where('title', 'PHP')->orderBy('id', 'asc')->take(3)->get();

//     return $posts;

// });

// Tenta encontrar o dado com id 'x' ou se não encontrar retornar um fail

// Route::get('/findmore', function(){

//     // $posts = Post::findOrfail(3);

//     // return $posts;

// Faz uma busca onde a coluna 'users_count' tem que ser < que 50 trazendo apenas o primeiro, ou retornado um fail caso nenhum seja encontrado com a primeira condição

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();

// });


// O comando save() pode fazer um insert na tabela caso ele seja instanciado, ou fazer um update caso vc faça um find no lugar de instanciar

// Route::get('/basicinsert', function(){

//     $post = new Post;

//     $post->title = 'Test new Eloquent title insert';
//     $post->content = 'Test eloquent, its incredible';

//     $post->save();

// });

// Route::get('/basicinsert2', function(){

//     $post = Post::find(2);

//     $post->title = 'Test new Eloquent title insert';
//     $post->content = 'Test eloquent, its incredible';

//     $post->save();

// });

// m

// Route::get('/create', function(){

//     Post::create(['title'=>'the cratte methoddafasfa', 'content'=>'test ttest teste stest test testasdfafa']);

// });


// Route::get('/update', function(){

//     Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'Just a single test']);

// });


// Route::get('/delete', function(){

//     $post = Post::find(6);

//     $post->delete();

// });


// // Posso usar esse método para dar um delete em um dado ou em vários, para deletar vários de uma vez, precisamos passar os id's dentro de um array

// Route::get('/delete2', function(){

//     Post::destroy([8, 9]);

//     //Ou

//     // Post::where('is_admin', 0)->delete();

// });

// // Com o 'softdelete' o laravel não irá apagar o dado da tabela definitivamente, mas sim preencher o campo 'deleted_at' que antes se encontrava vazio.
// Route::get('/softdelete', function(){

//     Post::find(5)->delete();

// });

// // Se tentarmos buscar este arquivo que foi "deletado" pelo softdelete, na hora do return ele não irá trazer nada. Agora se usarmaos o metodo staticamente 'withTrashed()' e fazer um filtro daquele dado anterior, será possível retorna-lo na tela.
// Route::get('/readsoftdelete', function(){

//     // $post = Post::find(5);

//     // return $post;

//     $post = Post::withTrashed()->where('id', 5)->get();

//     return $post;

// });

// // O dado que fui deletado através do softdelete() será restaurado através do método 'restore()', logo o campo 'deleted_at' volta a ter o valor null.
// Route::get('/restore', function(){

//     Post::withTrashed()->where('is_admin', 0)->restore();
    
// });

// // Este método irá apenas buscar os itens softdeleted e vai exclui-los definitivamente do database com o método 'forceDelete()'
// Route::get('/forcedelete', function(){

//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

// });

/*
|--------------------------------------------------------------------------
| CRUD Application
|--------------------------------------------------------------------------
*/


//OneToOne relationship

// Route::get('/user/{id}/post', function($id){

//     return User::find($id)->post;

// });

//OneToOne relationship caminho inverso
// Route::get('/post/{id}/user', function($id){

//     return Post::find($id)->user;

// });

//OneToMany Relationship
// Route::get('/posts', function(){


//     $user = User::find(1);

//     foreach($user->posts as $post){

//         echo $post->title . '<br>';

//     }

// });


//ManyToMany Relationship
// Route::get('/user/{id}/role', function($id){


//     $user = User::find($id)->roles()->orderBy('id')->get();
//     return $user;

//     // foreach($user->roles as $role){

//     //     echo $role->name . '<br>';

//     // }

// });


// Accessing the intermediate table / pivot
Route::get('user/pivot', function(){

    $user = User::find(2);

    foreach($user->roles as $role){
        
        echo $role->pivot;
    }


});


Route::get('user/country', function(){

    $country = Country::find(1);

    foreach($country->posts as $post){

        echo $post->title . '<br>';

    }

});


// Polymorphic Relations
Route::get('user/photos', function(){

    $user = User::find(1);

    foreach($user->photos as $photo){

        echo $photo . '<BR>';

    }


});

Route::get('post/photos', function(){

    $post = Post::find(1);

    foreach($post->photos as $photo){

        echo $photo . '<BR>';

    }


});

// Polymorphic relation the inverse
Route::get('photo/{id}/post', function($id){

    $photo = Photo::findOrFail($id);

    return $photo->imageable;

});

// Polymorphic ManyToMany
Route::get('post/tag', function(){


    $post = Post::find(1);

    foreach($post->tags as $tag){

        echo $tag->name;

    }

});


Route::get('tag/post', function(){

    $tag = Tag::find(2);

    foreach($tag->posts as $post){

        echo $post->title;

    }

});
