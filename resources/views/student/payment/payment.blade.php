<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/style.css">
   <base href="/public">
  @include('css')

  <style>
    /* ----- payment page ----- */
    body{
     
      font-size:20px;
    }
hr{
    border: 1px solid #f1f3f5;
}

.payment-container{
    margin: 5% 20% 5% 20%;
     background-color:#ffffff;
     border-radius:5px;
}

.amount{
    padding-bottom: 30px;
}
.amount h3{
  padding-top:10px;
    padding-left: 30px;
}

.amount-to-pay{
    display: flex;
    justify-content: space-between;
    padding-top: 10px;
}

.amount-to-pay p{
  padding-left: 30px;
  font-size: 20px;
}

.currency{
    font-size: 20px;
    padding-right:10px;
}

.payment-body{
    margin-top: 30px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
}

.payment-body h3{
    padding: 20px 0 20px 30px;
}

.payment-description{
    padding: 20px 30px 20px 30px; 
}

.payment-button{
    display: grid;
    grid-template-columns: 1fr;
    margin: 0 20% 5% 20%;
    gap: 20px;
   
   
}
.payment-button button{
  background-color:darkblue;
    color:#ffffff;
    font-size:20px;
}

.payment-info{
    display: flex;
    align-items: center;
    gap: 10px;
}

.payment-info img{
    width: 100px;
    height: 40px;
    border: 1px solid #f8f9fa;
    border-radius: 8px;
}

.col-1{
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-top: 20px;
    gap: 30px;
}
.col-1 button{
  background-color:darkblue;
    color:#ffffff;
    font-size:20px;
}

.col-2{
    display: grid;
    grid-template-columns: 22% 22% 48%;
    padding-top: 20px;
    gap: 30px;
}
.col-2 button{
  background-color:darkblue;
    color:#ffffff;
    font-size:20px;
}


input, button{
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #adb5bd;
}

button{
    cursor: pointer;
    color:#4c6ef5;
    border: 1px solid #4c6ef5;
    background-color: #ffffff;
}

/* ----- accordian -----*/
.accordion {
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    padding: 20px 0 20px 30px;
    border: none;
    outline: none;
    transition: 0.4s;
  }
  
  /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
  .active, .accordion:hover {
    background-color:#f8f9fa;
  }
  
  /* Style the accordion panel. Note: hidden by default */
  .panel {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
  }


/* ----- tabs ----- */

.tab {
    overflow: hidden;
  }
  
  /* Style the buttons inside the tab */
  .tab button {
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 16px;
  }

  .tab button img{
    width: 100px;
    height: 30px;
  }
  
  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color:#f1f3f5;
  }
  
  /* Create an active/current tablink class */
  .tab button.active {
    background-color:#f1f3f5;
  }
  
  /* Style the tab content */
  .tabcontent {
    display: none;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
  }
  
  /* Fade in tabs */
  @-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  
  @keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  </style>
</head>
<body>

@include('student.header')  

@include('student.sidebar')

<section class="teachers">

<div class="payment-container">
      <div class="amount">
        <div>
          <h3>Payment Details</h3>
        </div>
        <div class="amount-to-pay">
          <p>Amout to Pay:</p>
          <p>KES <span class="currency">60,000</span></p>
        </div>
      </div>
      <div>
        <h3 style="padding-left:30px;">Choose payment method</h3>
      </div>
      <div class="payment-body">
        <!-- accordian starts -->
        <div class="skills" id="skills">
          <div class="accordion">Pay with Credit Card</div>
          <div class="panel">
            <div class="payment-description">
              <div class="payment-info">
                <p>We accept following credits card(s):</p>
                <img src="./assets/images/visa.png" alt="visa_logo" />
              </div>
              <div class="payment-input">
                <div class="col-1">
                  <input type="text" placeholder="Card Number" />
                  <input type="text" placeholder="Full Name" />
                </div>
                <div class="col-2">
                  <input type="text" placeholder="MM/YY" />
                  <input type="text" placeholder="CVC" />
                  <button>pay now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <!-- accordian ends -->
        <!-- accordian starts -->
        <div class="skills" id="skills">
          <div class="accordion">
            <p>Pay with Mobile Money</p>
          </div>
          <div class="panel">
            <div class="payment-description">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'tab1')">
                  <img src="./assets/images/lipanampesa.png" alt="lipanampesa" />
                </button>
                <button class="tablinks" onclick="openCity(event, 'tab2')">
                  <img src="./assets/images/tigopesa.png" alt="tigopesa" />
                </button>
              </div>
              <!-- tabs contents starts -->
              <div id="tab1" class="tabcontent">
                <div class="payment-input">
                  <div class="col-1">
                    <input type="text" placeholder="Mobile Number" />
                    <button>pay now</button>
                  </div>
                </div>
              </div>
              <!-- tabs contents ends -->
              <!-- tabs contents starts -->
              <div id="tab2" class="tabcontent">
                <div class="payment-input">
                  <div class="col-1">
                    <input type="text" placeholder="Mobile Number" />
                    <button>pay now</button>
                  </div>
                </div>
              </div>
              <!-- tabs contents ends -->
            </div>
          </div>
        </div>
        <hr />
        <!-- accordian ends -->
      </div>
    </div>
    <!-- button starts -->
    <div class="payment-button">
      <button><a href="{{url('student/cart/cart')}}" style="color:#ffffff;">Back to Cart</a></button>
    </div>
    <!-- button ends -->

</section>


<!-- custom js file link  -->
<script src="./assets/js/script.js"></script>
<script>
    // accordian
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}


// tabs
function openCity(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>
   
</body>
</html>