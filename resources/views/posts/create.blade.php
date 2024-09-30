<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST"enctype="multipart/form-data">
            @csrf
            <div class = "image">
                <input type="file" id ="image_files" name="post[image][]"  multiple>
                
                <p class ="image__error" style = "color:red">{{$errors -> first('post.image')}}</p>
                <p class ="image__error" style = "color:red">{{$errors -> first('post.image.*')}}</p>
            </div>
            
            <div id="cimage"></div>
            
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
                <p class ="title__error" style = "color:red">{{$errors -> first('post.title')}}</p>
            </div>
            <div class="body">
                <h2>Caption</h2>
                <textarea name="post[body]" placeholder="キャプション"></textarea>
                <p class ="caption__error" style = "color:red">{{$errors -> first('post.body')}}</p>
            </div>
            <input type="submit" value="アップロード"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>

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
</html>



