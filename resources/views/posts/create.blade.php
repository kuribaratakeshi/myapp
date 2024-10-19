
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>

    <x-app-layout>
    <x-slot name="header">
      Blog
    </x-slot>
    <body >
        
    <div class="container mx-auto pt-10 px-2">

     <h1  class="text-center font-bold py-2">Blog Name</h1>
    
     <div class="flex flex-col gap-2 border p-4 rounded-lg">

     <form action="/posts" method="POST"enctype="multipart/form-data">
            @csrf
            <div class = "image">
                <input type="file" id ="image_files" name="post[image][]"  multiple>

                <p class ="image__error" style = "color:red">{{$errors -> first('post.image')}}</p>
                <p class ="image__error" style = "color:red">{{$errors -> first('post.image.*')}}</p>
            </div>
            
            <div  id="cimage"></div>
            
            <div class="bg-red-500 text-black p-4" id="tagform">
            <h2>Tag</h2>
                <form>
                    <input list ="taglist" autocomplete="off"  type="search" id="taginput" />
                        <datalist id="taglist">
                            <option value="Java"></option>
                            <option value="JavaScript"></option>
                            <option value="Ruby"></option>
                            <option value="Python"></option>
                            <option value="PHP"></option>
                            <option value="TypeScript"></option>
                            <option value="HTML"></option>
                            <option value="CSS"></option>
                        </datalist>
                </form>
            </div>

            <div class=" bg-blue-500 text-black p-4">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class ="title__error" style = "color:red">{{$errors -> first('post.title')}}</p>
            </div>
            <div class=" bg-blue-500 text-black p-4">
                <h2>Caption</h2>
                <textarea name="post[body]" placeholder="キャプション"></textarea>
                <p class ="caption__error" style = "color:red">{{$errors -> first('post.body')}}</p>
            </div>
            <input  
            class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded"
             type="submit" 
             value="アップロード"
             />
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>




     </div>
   

    </div>
       
    </body>

</x-app-layout>
    
<script>

const fileInput = document.getElementById("image_files");
var element  = document.getElementById( "cimage" );

const handleFileSelect = () =>{
      // 子要素を全て削除
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }

    const files= fileInput.files;
    for (let i = 0; i < files.length; i++) {
    console.log(files[i]);// 1つ1つのファイルデータはfiles[i]で取得できる
    

    let new_element = document.createElement('p');
    new_element.textContent  =files[i].name;

    element.appendChild(new_element);
}
}
fileInput.addEventListener('change', handleFileSelect);

</script>

<script>

    const input =document.getElementById("taginput");
    //input.addEventListener('input',inputTagFormChange);

    //var taglist = document.getElementById("taglist");

    input.addEventListener('input',function(e){
        var t=e.target;
        if(t.nodeName=="INPUT" && t.type=="search"){
            var v=t.value;
            var l=t.getAttribute('list');
            Array.prototype.map.call(document.querySelectorAll('#'+l+' option'),function(i){
            i.disabled=!i.value.match(new RegExp("^"+v));
            //console.log(i.disabled);
            console.log("a"); 
        });
        }
    });


    function inputTagFormChange(){



    }

</script>
</html>



