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
<html lang="en">
<head>
  <title> SoongPiler-JAVA</title>
  <meta charset="utf-8">

  <meta name="author" content="YUSEONG">
  <meta name="description" content="SoongPiler Project">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1">

  <!-- http://ogp.me/ -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="SoongPiler">
  <meta property="og:title" content="Build software better, together">
  <meta property="og:description" content="SoongSil Univ Web Compiler Project">
  <meta property="og:image" content="img/logo__github.png">
  <meta property="og:url" content="https://ssu.ac.kr">

  <!-- https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started.html -->
  <meta property="twitter:card" content="summary">
  <meta property="twitter:site" content="SoongPiler">
  <meta property="twitter:title" content="Build software better, together">
  <meta property="twitter:description" content="SoongSil Univ Web Compiler Project">
  <meta property="twitter:image" content="img/logo__github.png">
  <meta property="twitter:url" content="https://ssu.ac.kr">

  <!-- <link rel="shortcut icon" href="image/x-icon" href="favicon.ico"> --> 
  <link rel="icon" href="../favicon.png">
  <link rel="apple-touch-icon" href="../favicon.png">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/reset.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <div class="body__container">  

    <!-- HEADER -->
    <header class="section">
        <div class="inner clearfix">
            <div class="menu-group float--left">
                <div class="logo">
                    <a href="../index.html">SoongPiler</a>
                </div>
                <ul class="main-menu">
                    <li><a href="../index.html">SoongPiler</a></li>
                    <li><a href="../View/1.html">학습하기</a></li>
                    <li><a href="../Controller/compile.php">JAVA 코딩</a></li>
                    <li><a href="../Controller/python.php">PYTHON 코딩</a></li>
                    <li><a href="#">질문하기</a></li>
                </ul>
            </div>

            <div class="sign-group float--right">
                <div class="btn-group">
                    <a href="#" class="btn sign-in">Sign in</a>
                    <a href="#" class="btn btn--primary sign-up">Sign up</a>
                </div>
                <form id="search-form" method="POST" action="">
                    <input type="text" id="search" class="input--text" placeholder="Search SoongPiler">
                    <input type="submit" value="Submit">
                </form> 
                <ul class="sub-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Support</a></li>
                </ul>                   
            </div>

        </div>
    </header>
  </div>
  <br><br>
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
    <br>
    <예시 코드>
    <br>
    <img src="../model/example.PNG">
    <a href="python.php">파이썬</a>
    <a href="exec.php">결과</a>
    <?php
    javac();
     ?>
  </body>
</html>
