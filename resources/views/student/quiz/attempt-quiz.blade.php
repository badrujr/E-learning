<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Quiz</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')
</head>
<body>

@include('student.header') 

@include('student.sidebar')

<section class="playlist-details">

   <h1 class="heading">test yourself</h1>

   <div class="row">
  
      <div class="column">
   
         <div class="thumb">
            <img src="coursecategoryimage/{{$course->course->courseCategory->image}}" alt="">
         </div>
      </div>
      <div class="column">
         <div class="tutor">
            <img src="tutorimage/{{$course->course->tutor->image}}" alt="">
            <div>
               <h3>{{$course->course->tutor->name}}</h3>
               <span>{{$course->created_at}}</span>
            </div>
         </div>
   
         <div class="details">
            <h3>category: {{$course->name}}</h3>
            <p>course: {{$course->course->name}}</p>
            <p>{{$course->course->content}}</p>
         </div>
      </div>


   </div>

</section>

<section class="playlist-videos">

   <h1 class="heading">Quizzes</h1>

</section>
<section class="teachers">
<div class="box-container">
<div class="quiz-container" id="quiz">
@forelse($course->course->quiz as $key=>$quizzes)
    <div class="quiz-header">
     
      <h3 id="question">{{$quizzes->question}}</h3>
    
      
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="a_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="b_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="c_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="d" class="answer">
          <label for="d" id="d_text">Answer</label>
        </li>
      </ul>
    
    </div>

    <button class="btn" id="submit">Submit</button>
  </div>
  @empty
  <div class="box container">
  <p style="font-size:20px;">No quiz available for this course</p>
  </div>
     
      @endforelse
</div>
</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>

   
</body>
</html>