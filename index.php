<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$respond_text = "<p>Fields with  *  are required</p>";  

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim(filter_input(INPUT_POST, "name" ,  FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email" ,  FILTER_SANITIZE_STRING));
    $subject = trim(filter_input(INPUT_POST, "subject" ,  FILTER_SANITIZE_STRING));
    $message = trim(filter_input(INPUT_POST, "message" ,  FILTER_SANITIZE_STRING));


    if ($name == '' || $email == ''){
      $respond_text = '<p>Please fill in the required fields: Name and Email.</p>';
       // header("location:index.php?status=field-rquired#contact"); 
    }else{
        if (PHPMailer::validateAddress($email)){
        $body = "Name of the sender : ". $name ."<br />";
        $body .= "Subject of the email : ". $subject ."<br />";
        $body .= "Email address : ". $email . "<br />";
        $body .= "<u style='font-size: 18px;'>Reason for the email</u> " ."<br />" .$message;

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 0;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = "adebolaaladesuru@googlemail.com";                 // SMTP username
          $mail->Password = 'csrijcmlppbncazq';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom('adebolaaladesuru@googlemail.com', 'Adebola Aladesuru');
          $mail->addAddress('adebolaaladesuru@googlemail.com', 'Adebola A');     // Add a recipient
          // $mail->addAddress('adebolaaladesuru@googlemail.com');               // Name is optional
          $mail->addReplyTo($email, $name);
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          // //Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $subject;
          $mail->Body    = $body;
          $mail->AltBody = $body;

          $mail->send();
          header("location:index.php?status=thank-you#contact"); 
          // $respond_text = '<p>Message sent and thank you for getting in touch</p>';

      } catch (Exception $e) {
          $respond_text = '<p>Message could not be sent. Mailer Error: </p>' . $mail->ErrorInfo;
        }
    } 
    else {
       $respond_text = '<p>Please provide a valid email address.</p>';
    }

    }
    
}

if (isset($_GET["status"]) && $_GET["status"] == "thank-you") {
    $respond_text = '<p>Message sent and thank you for getting in touch.</p>';
}

include("header.php") ;

?>

        <section class="hero-area" id="heroArea">
          <div class="name-and-title">
            <h1>ADEBOLA ALADESURU <span>Software / Web Developer</span></h1>
          </div>
          <div class="my-picture"></div>
        </section>

        <section class="personal-statement">
            <p class="personal-statement-content">
                I have a sound IT background and good interpersonal skills, with minimum of three years industry experience, which includes administrative tasks, training, testing, implementing, supporting and managing. My strong background in IT has allowed me to work in all aspect in the IT industry. I possess excellent leadership, communication and team working skills.
                <strong><q><i> You need the right people with You , not the best people. </i></q> - Jack Ma</strong>
            </p>
        </section>

        <section id="resume">
          <div class="work-experience"><!-- start of work experience -->

            <div class="title">
              <h1>RESUME</h1>
              <div class="title-hr"></div>
            </div>

            <div class="card-container"> 
            <div class="card card-1">
              <h2>Front-End Developer</h2>
              <h3>@ Ringley Property Group, London<br/> <span class="work-experience-h3-4"> 2016 - Current</span></h3>
              <h4> Key Responsibilities: </h4>
              <p>
                 <ul>
                    <li>Discussing the requirements of a project (the brief) with clients and colleagues with confidence, to present and explain ideas to clients and colleagues</li>
                    <li>Deriving the Physical design: determine how the software interface looks like base on the business requirement</li>
                    <li>Develop and maintaining website: building dynamic interface that connect customer or client globally, using <strong>Xhtl, html, css, dreamwaver, mysql, javascript, jquery, react , photoshop, GIT, bootstrap</strong></li>
                    <li>Maintaining and Supporting an Application: Responding to client query and provide assistant in building solution </li>
                 </ul>
              </p>
            </div>

            <div class="card">
              <h2>Back-End Developer</h2>
              <h3>@ New Convent , London<br/> <span> 2014 – 2016 </span></h3>
              <h4> Key Responsibilities: </h4>
              <p>
                 <ul>
                    <li>Develop and maintaining website: building dynamic interface that connect customer or client globally, using <strong>Xhtl, html, css, dreamwaver, php , mysql, javascript, jquery, photoshop, bootsrap</strong></li>
                    <li>Creation of deliverable executable code, unit tests and supporting documentation.</li>
                    <li>Deploying an Application: upload the software to client local system or server</li>
                    <li>Creation of deliverable executable code, unit tests and supporting documentation.</li>
                 </ul>
              </p>
            </div>

            <div class="card">
              <h2>Software / Web Developer</h2>
              <h3>@ FSquare Service Limited, London<br/> <span> 2011 – 2014 </span></h3>
              <h4> Key Responsibilities: </h4>
              <p>
                 <ul>
                    <li>Discussing the requirements of a project (the brief) with clients and colleagues with confidence, to present and explain ideas to clients and colleagues.</li>
                    <li>Deriving the Physical design: determine how the software interface looks like base on the functionality. </li>
                    <li>Creating Data Services: structuring data using SQL .</li>
                    <li>Develop and maintaining website: building dynamic interface that connect customer or client globally, using <strong> Xhtl, html, css, dreamwaver, php , mysql, javascript, jquery, pphotoshop</strong></li>
                 </ul>
              </p>
            </div>
          </div>

          </div><!-- End of work experience -->
        </section>

        <section id="skill-container">
              <h2>Programming Skills</h2>
              <div class="programming-skill">
                <div class="skill-bg">
                  <ul>
                    <li><span class="skills skill-php">PHP</span></li>
                    <li><span class="skills skill-html">HTML</span></li>
                    <li><span class="skills skill-css">CSS</span></li>
                    <li><span class="skills skill-javascript">JAVASCRIPT</span></li>
                    <li><span class="skills skill-jquery">JQUERY</span></li>
                    <li><span class="skills skill-react">REACT</span></li>
                  </ul>
                </div>
              </div>
              <br />
        </section>

        <section id="project">
          <div class="project"><!-- start of project -->
            <div class="title">
              <h1>PROJECT</h1>
              <div class="title-hr"></div>
            </div>
            <div class="card-container">

            <div class="card">
              <img src="img/project-3.jpeg" alt="Scoreboard Application" />
              <div class="photo-overlay">
                <h2>Scoreboard Application</h2>
                <p>
                  Application use in tracking players score for games.
                </p>
                <a href="https://aladesuru.github.io/scoreboard-app/" target="_blank">Click here to view</a>
              </div>
            </div>

              <div class="card">
              <img src="img/project-1.jpeg" alt="online book store" />
              <div class="photo-overlay">
                <h2>Organisation Website</h2>
                <p>
                 Platform that introduce company services and connect the Landord , Tenant and Agent . Also part of internal tasks are done in the platform.
                </p>
                <a href="https://www.ringley.co.uk/" target="_blank">Click here to view</a>
              </div>
            </div>

            <div class="card">
              <img src="img/project-2.jpeg" alt="student record data management" />
              <div class="photo-overlay">
                <h2>Student Record Data Management</h2>
                <p>
                  Single page application design to handle part of record management.
                </p>
                <a href="https://aladesuru.github.io/display_report/" target="_blank">Click here to view</a>
              </div>
            </div>

            

          </div>
        </div><!-- End of project --> 
      </section>

      <section id="contact">
       <div class="title">
          <h1>CONTACT</h1>
          <div class="title-hr"></div>
        </div>
         <div class="card-container"><!-- start of contact -->

          <div class="card call-me">
            <h2>Give me a call or email</h2>
            <div><strong><span class="visuallyhidden">Email</span><span class="icon icon-email"></span></strong><a href="mailto: boluxyz@yahoo.com"> boluxyz@yahoo.com</div>
            <div><strong><span class="visuallyhidden">Mobile</span></strong><span class="icon icon-mobile"><a href="tel:07534939000">07534939000</a></span></div>
            <div>
              <strong><span class="visuallyhidden">Address</span></strong><span class="icon icon-address"> London United kingdom </span>
            </div>
          </div>

          <div class="card message-me" id="message-container">
            <div id="form-message">
              <h2 id="thank-you">Send me a message</h2>
              <?php   echo $respond_text ;  ?>
              <form id="email-form" method="Post" action="index.php">
               <div id="name-row">
                <label for="name">
                  <span class="label">Name <span> * </span> </span><span><input id="name" type="text" name="name" placeholder="Please enter your name" value="<?php if(isset($name)){ echo $name ; } ?>"></span>
                </label>
              </div>
               <div id="email-row"><label for="email"><span class="label">Email <span> *</span> </span><span><input id="email" type="text" name="email" placeholder="Please enter your email" value="<?php if(isset($email)){ echo $email ; } ?>"></span></label>
               </div>
               <div>
                <label for="subject">
                  <span class="label">Subject </span><span ><input id="subject" type="text" name="subject" placeholder="Enter your subject" value="<?php if(isset($subject)){ echo $subject ; } ?>"></span>
                </label>
               </div>
               <div>
                <label for="message">
                  <span class="label">Message </span><span><textarea id="message" name="message" placeholder="Type your message"> <?php if(isset($email)){ echo $message; } ?> </textarea></span>
                </label>
               </div>
               <div class="submit-btn"><input type="submit" name="submit" value="Send"></div>
              </form>
            </div>
          </div>

          </div><!-- End of contact -->
      </section>

<?php include("footer.php") ?>
       