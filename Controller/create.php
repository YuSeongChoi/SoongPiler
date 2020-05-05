 <?php
 file_put_contents($_POST['title'], $_POST['code']);

 function javac(){
   if(isFileExist() == 1) {
     $exec = "javac Solution.java";
     shell_exec($exec);
     // echo $exec;

     // java를 통해 생성된 class 파일 실행
     $output = shell_exec("java Solution");
     echo $output;
   }
 }

 function isFileExist(){
   $location = "Solution.java";
   if(file_exists($location)) {
     return true;
   } else {
     return false;
   }
 }

 function fileDelete(){
   unlink('Solution.java');
   unlink('Solution.class');
 }
  ?>
   <head>
     <meta charset="utf-8">
     <title>Soongpiler</title>
     <h1>숭파일러</h1>
   </head>
   <body>
     소스코드 입력(class명은 Solution)
     <form action="create.php" method="post">
       <p>
         <!-- <input type="text" name="title" placeholder="Title" value="solution.java"readonly="readonly"> -->
         <input type="hidden" name="title" value="Solution.java"/>
       </p>
       <p>
         <textarea name="code" placeholder="Input Code"
           style="width:100%;border:1;overflow:visible;text-overflow:ellipsis;" rows=30></textarea>
       </p>
       <p>
         <input type="submit">
       </p>
     </form>
     <?php
     javac();
    //  fileDelete();
      ?>
      <br>
      <a href="../index.html">돌아가기</a>
   </body>
 </html>
