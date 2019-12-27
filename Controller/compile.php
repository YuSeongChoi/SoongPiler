<?php
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

$default = "public class Solution
{
  public static void main(String[] args) {

  }
}"

 ?>
  <head>
    <meta charset="utf-8">
    <title>Soongpiler</title>
    <a href="../index.html"><h1>숭파일러</h1></a>
  </head>
  <body>
    소스코드 입력(class명은 Solution)
    <form action="create.php" method="post">
      <p>
        <!-- <input type="text" name="title" placeholder="Title" value="solution.java"readonly="readonly"> -->
        <input type="hidden" name="title" value="Solution.java"/>
      </p>
      <p>
        <textarea name="code" placeholder="public class Solution
        {
          public static void main(String[] args) {

          }
        }"
          style="width:100%;border:1;overflow:visible;text-overflow:ellipsis;" rows=30 ></textarea>
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
    <예시 코드>
    <br>
    <img src="../model/example.PNG">
    <?php
    javac();
     ?>
  </body>
</html>
