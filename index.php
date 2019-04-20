<?php

function get_CURL($url){
  $curl = curl_init(); // untuk inisialisasi
  curl_setopt($curl, CURLOPT_URL, $url); // pemanggila option $curl
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyARCQ45O2qYe3e5u4Msw7zDCi3KMk1soDI');

$youtubeprofilePic = $result ['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result ['items'][0]['snippet']['title'];
$subsrciber = $result ['items'][0]['statistics']['subscriberCount'];

//latest video

$urllatestVideo = ('https://www.googleapis.com/youtube/v3/search?key=AIzaSyARCQ45O2qYe3e5u4Msw7zDCi3KMk1soDI&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=5&order=date&part=snippet');
$result = get_CURL ($urllatestVideo);
$latestVideo = $result ['items'][0]['id']['videoId'];

//instagram api

$instagramclienApi = '71709873063e4a8f8e2d3549dd978fe0';
$accesToken = '6007999383.7170987.4590ca1cc9304ce795567dc54674a65f';
$result = get_CURL('https://api.instagram.com/v1/users/self?access_token=6007999383.7170987.4590ca1cc9304ce795567dc54674a65f');

$usernameIg = $result ['data']['username'];
$profilePic = $result ['data']['profile_picture'];
$followers = $result ['data']['counts']['followed_by'];

//latest ig post

$result = get_CURL ('https://api.instagram.com/v1/users/self/media/recent?access_token=6007999383.7170987.4590ca1cc9304ce795567dc54674a65f&count=5');
$photos = [];
  foreach ($result ['data'] as $photo){
    $photos[] = $photo['images']['thumbnail']['url'];
  }

// =======================================//
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noto Setiyoputro</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
        img {
          border: 1px solid #ddd;
          border-radius: 4px;
          padding: 5px;
          width: 150px;
        }
        
        img:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
  </head>

  <body id="top">
    <header>
      <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-info" color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip">Mr.Oton</a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>


    <div class="page-content">
      <div>
        <div class="profile-page">
          <div class="wrapper">
            <div class="page-header page-header-small" filter-color="green">
              <!-- <div class="page-header-image" data-parallax="true">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="images/oton1.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                          <img src="images/bg.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                          <img src="images/bg1.jpg" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="images/bg2.jpg" class="d-block w-100">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div> -->
              <div class = "page-header-image" id="particles-js" data-parallax="true" style="background-image: url('images/angkasa.jpg');">
              </div>

              <div class="container"> 
                <div class="content-center">
                  <div class="cc-profile-image"><img src="images/oton1.jpg"/></div>
                  <div class="h2 title">Noto Setiyoputro</div>
                  <p class="category text-white">S1 Teknik Informatika - Web Developer</p>
                  <a class="btn btn-info" target="_blank" href="https://bit.ly/2XmeHjd" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Download CV</a>
                </div>
              </div>


              <div class="section">
                <div class="container">
                  <div class="button-container">
                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.facebook.com/notosetiyo" target="_blank" rel="tooltip" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a>
                    
                    <a class="btn btn-default btn-round btn-lg btn-icon" href="https://www.instagram.com/noto_setiyo" target="_blank" rel="tooltip" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="section" id="about">
          <div class="container">
            <div class="card" data-aos="fade-up" data-aos-offset="10">
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <div class="card-body">
                    <div class="h4 mt-0 title">About</div>
                    <p>Hallo!! My name is <b>Noto Setiyoputro</b>, usually called <b>Noto</b>. I was born in Banjarnegara, Central Java.</p>
                    <p class="text-justify">I am a developer of Junior web programming. I understand the basics of the PHP programming language. Familiar uses frameworks such as codeigniter and laravel, and is used to using and managing mysql databases, and sql servers. I master the use of computers, Microsoft Office, the Internet, and understand about computer hardware and software. I am an easy-to-adapt person, easy to work in a team. Love the world of programming especially website development, mobile development, and like new things related to technology.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="card-body">
                    <div class="h4 mt-0 title">Basic Information</div>
                    <div class="row">
                      <div class="col-sm-4"><strong class="text-uppercase">Age:</strong></div>
                      <div class="col-sm-8">22</div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                      <div class="col-sm-8">notosetiyo8@gmail.com</div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
                      <div class="col-sm-8">+6287-781-955-877</div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-sm-4"><strong class="text-uppercase">Address:</strong></div>
                      <div class="col-sm-8">Karangsalam RT 01 RW 03, Susukan Subdistrict, Banjarnegara Regency, Central Java Postal Code 53475</div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-sm-4"><strong class="text-uppercase">Language:</strong></div>
                      <div class="col-sm-8">Indonesia, English, Java Language</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="section" id="skill">
          <div class="container">
            <div class="h4 text-center mb-4 title">Professional Skills</div>
            <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="progress-container progress-info  "><span class="progress-badge">HTML</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div><span class="progress-value">80%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="progress-container progress-warning"><span class="progress-badge">CSS</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-warning" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div><span class="progress-value">50%</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="progress-container progress-warning"><span class="progress-badge">JavaScript</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div><span class="progress-value">50%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="progress-container progress-info"><span class="progress-badge">Microsoft Office</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div><span class="progress-value">80%</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="progress-container progress-primary"><span class="progress-badge">Bootstrap</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">75%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="progress-container progress-primary"><span class="progress-badge">Photoshop</span>
                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div><span class="progress-value">70%</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="progress-container progress-info"><span class="progress-badge">Internet</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div><span class="progress-value">85%</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="progress-container progress-primary"><span class="progress-badge">Database (Mysql, Sql Server)</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-info" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div><span class="progress-value">75%</span>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>






        <div class="section" id="portfolio">
          <div class="container">
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="h4 text-center mb-4 title">Portfolio</div>
                <div class="nav-align-center">
                  <ul class="nav nav-pills nav-pills-info" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#web-development" role="tablist"><i class="fa fa-laptop" aria-hidden="true"></i></a></li>

                    <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#graphic-design" role="tablist"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li> -->
                  </ul>
                </div>
              </div>
            </div>

            <div class="tab-content gallery mt-3">
              <div class="tab-pane active" id="web-development">
                <div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card">
                        <a target="_blank" href="images/dinus.jpg">
                        <img src="images/dinus.jpg" class="card-img-top" width="100px"></a>
                        <div class="card-body">
                          <p class="card-text text-justify">This certificate was obtained in 2018, I am one of the finalists of the Dinus Application Competition in the category of national level students in making a mobile application held by Dian Nuswantoro University. At that time I entered the top 10.</p>
                        </div>
                      </div>

                      <div class="card">
                        <a target="_blank" href="images/office.jpg">
                        <img src="images/office.jpg" class="card-img-top" width="100px"></a>
                        <div class="card-body">
                          <p class="card-text">I obtained this certificate in 2018, precisely after I took part in a certification program held by Microsoft about misrosoft office desktop training held at STMIK Amikom Purwokerto.</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card">
                        <a target="_blank" href="images/fcns.jpg">
                        <img src="images/fcns.jpg" class="card-img-top" width="100px"></a>
                        <div class="card-body">
                          <p class="card-text">I obtained this certificate on March 21, 2018, precisely after I did the certification held by Foresec Academia Amat Victoria Curam held at STMIK Amikom Purwokerto. On this FCNS certification I get grade A.</p>
                        </div>
                      </div>

                      <div class="card">
                        <a target="_blank" href="images/assisten.jpg">
                        <img src="images/assisten.jpg" class="card-img-top"></a>
                        <div class="card-body">
                          <p class="card-text">Assistant Forum Membership Certificate, As Practical Assistant STMIK Amikom Purwokerto.</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="card">
                        <a target="_blank" href="images/prima.jpg">
                        <img src="images/prima.jpg" class="card-img-top"></a>
                        <div class="card-body">
                          <p class="card-text">This certificate was obtained in 2018, when I joined the PRIMA 2018 competition organized by the Assistant Forum STMIK Amikom Purwokerto. At that time I won first place in the hacking category.</p>
                        </div>
                      </div>
                      <div class="card">
                        <a target="_blank" href="images/pb-speaking.jpg">
                        <img src="images/pb-speaking.jpg" class="card-img-top"></a>
                        <div class="card-body">Certificate of Participation
                          Has actively participoted in publick speaking training Banyumas Muda 4-5 march 2017 Banyumas, Central Java.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="graphic-design" role="tabpanel">
                <div class="ml-auto mr-auto">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="card">
                        <img src="images/oton1.jpg" class="card-img-top">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
  
                      <div class="card">
                        <img src="images/oton1.jpg" class="card-img-top">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card">
                        <img src="images/oton1.jpg" class="card-img-top">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                      <div class="card">
                        <img src="images/oton1.jpg" class="card-img-top">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="section" id="experience">
          <div class="container cc-experience">
            <div class="h4 text-center mb-4 title">Experience</div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-danger" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-experience-header">
                    <p>2016 - 2017</p>
                    <div class="h5">INTERMEDIA</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Chairman of INTERMEDIA</div>
                    <p class="text-justify">INTERMEDIA (Information Technology Research and Multimedia) is one of the UKM (Student Activity Unit) in STMIK Amikom Purwokerto which is engaged in technology. I entered INTERMEDIA in 2015 as a member of the Public Relations division, then in 2016-2017 I was entrusted to be the General Chair of UKM INTERMEDIA (INFORMATION TECHNOLOGY RESEARCH AND MULTIMEDIA) at STMIK AMIKOM Purwokerto.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-info" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-experience-header">
                    <p>April 2014 - March 2016</p>
                    <div class="h5">Assistant Forum</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Assistant Lecturer Practicum</div>
                    <p class="text-justify">The Assistant Forum is a forum for teaching assistants in STMIK AMIKOM Purwokerto who have the task of helping lecturers in the process of delivering material to students, especially during practicum. I entered the Assistant Forum Membership from 2016 to 2018. Some of the subjects I have taught as a member in the STMIK Amikom Purwokerto assistant forum include; Data structures & Algorithms, Database Systems, Statistics Probability, Representation & reasoning, Semantic Logic Programming, and .NET Programming and Data Structure.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-experience-header">
                    <p>2017 - 2018</p>
                    <div class="h5">Gitaswara Informatika</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Choir</div>
                    <p class="text-justify">Gitaswara Informatika is a choir team at STMIK Amikom Purwokerto. I entered the Gitaswara membership from 2017 to 2018.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
                <div class="row">
                  <div class="col-md-3 bg-warning" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                    <div class="card-body cc-experience-header">
                      <p>2017 - Sekarang</p>
                      <div class="h5">Freelancer</div>
                    </div>
                  </div>
                  <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                    <div class="card-body">
                      <div class="h5">Freelancer Web Programming</div>
                      <p class="text-justify">Some projects have been worked out of becoming a freelancer, including making Online Shop applications, tourist websites, BWM Employee Attendance Processing (Website), Website violation points data processing students and several other projects.</p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>


        <div class="section">
          <div class="container cc-education">
            <div class="h4 text-center mb-4 title">Education</div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-danger" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-education-header">
                    <p>2015 - 2019</p>
                    <div class="h5">Bachelor's degree</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="30" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Bachelor of Informatics Engineering</div>
                    <p class="category text-justify">STMIK AMIKOM PURWOKERTO</p>
                    <p class="text-justify">I received my undergraduate education at STMIK Amikom Purwokerto which is located at Jl. Pol. Soemarto, Karangjambu, Purwanegara, North Purwokerto, Banyumas Regency, Central Java 53127. I majored in informatics engineering. I entered college in October 2015 and graduated in April 2019 with a 3.5 year education and obtained a GPA of 3.76.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-info" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-education-header">
                    <p>2012 - 2015</p>
                    <div class="h5">Senior High School</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Science Major</div>
                    <p class="category">Purwareja Klampok 1 Public High School</p>
                    <p class="text-justify">I received a high school education at Purwareja 1 Public High School, Klampok, which is located at Jl. Raya Purwareja Klampok, Dusun Sidodadi, Purworejo, Purworejo Klampok, Banjarnegara, Central Java 53474. I took IPA (Natural Sciences).</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="row">
                <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body cc-education-header">
                    <p>2009 - 2012</p>
                    <div class="h5">Junior high school</div>
                  </div>
                </div>
                <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                  <div class="card-body">
                    <div class="h5">Junior High School</div>
                    <p class="category">Susukan 1 Junior High School</p>
                    <p class="text-justify">I was educated in a Junior High School at Susukan 1 Middle School, having the address JL. Raya Susukan, RT. 1, RW. 1, Semingkir, Panerusan Wetan, Serang, Panerusan Kulon, Susukan, Banjarnegara, Central Java 53475. I first entered junior high school in 2009 and graduated in 2012.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>





        <div class="section" id="reference">
          <div class="container cc-reference">
            <div class="h4 mb-4 text-center title">Achievement</div>
            <div class="card" data-aos="zoom-in">
              <div class="carousel slide" id="cc-Indicators" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#cc-Indicators" data-slide-to="0"></li>
                  <li data-target="#cc-Indicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 cc-reference-header"><img src="images/dinus.jpg"/>
                        <div class="h5 pt-2">Dinus Application Competition</div>
                      </div>
                      <div class="col-lg-9 col-md-9">
                        <p class="text-justify">In 2018 participated in the national level Dinus Application Competition held by Dian Nuswantoro University. The category of competition that followed was the mobile application category and managed to become the top 10 finalist.</p>
                      </div>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-lg-3 col-md-3 cc-reference-header"><img src="images/prima.jpg"/>
                        <div class="h5 pt-2">PRIMA 2018</div>
                      </div>
                      <div class="col-lg-9 col-md-9">
                        <p class="text-justify">In 2018 my team consisting of two people took part in the competition held by the STMIK Amikom Purwokerto Assistant Forum known as the PRIMA (Amikom Student Scientific Fair) race. the types of competitions consist of mobile application, web programming, web design and hacking. At PRIMA 2018, my team won 1st place in the Hacking category.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>






        <div class="section" id="skill">
          <div class="container">
            <div class="h4 text-center mb-4 title">Social Media</div>
            <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <!-- class="rounded-circle img-thumbnail" untuk memaksa gambar kotak menjadi bulat dan bergaris putih untuk thumbnail -->
                        <img src=" <?= $youtubeprofilePic; ?>" width="200" class="rounded-circle img-thumbnail">
                      </div>
                      <div class="col-md-8">
                        <h5><?= $channelName; ?></h5>
                        <p> <?= $subsrciber; ?> Subscribers</p>
                        <div class="g-ytsubscribe" data-channelid="UCthIK5CkmbAblaHqSrl0o9A" data-layout="default" data-count="default"></div>
                      </div>
                    </div>

                  <div class="row mt-4 pb-4">
                      <div class="col">
                        <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideo; ?>?rel=0" allowfullscreen>
                          </iframe>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="row pb-3">
                    <div class="col-md-4">
                      <img src="<?= $profilePic; ?>" width="200" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="col-md-8">
                      <h5><?= $usernameIg; ?></h5>
                      <p><?= $followers; ?> Followers </p>
                    </div>
                  </div>

                <div class="row mt-3 pb-3">
                  <div class="col">
                    <?php foreach ($photos as $photo) : ?>
                    <div class="ig-thumbnail" class="rounded-circle">
                      <img src="<?= $photo ?>">
                    </div>
                    <?php endforeach; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="section" id="contact">
          <div class="cc-contact-information" style="background-image: url('images/alamat.png');">
            <div class="container">
              <div class="cc-contact">
                <div class="row">
                  <div class="col-md-9">
                    <div class="card mb-0" data-aos="zoom-in">
                      <div class="h4 text-center title">Contact Me</div>
                       <h3 class="text-center"><div id="mail-status"></div></h3>
                       
                        <div class="row">
                          <div class="col-md-6">
                            <div class="card-body">

                              <form id="frmEnquiry" action="" method="post">
                              <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                      <input class="form-control" type="text" name="userName" id="userName"placeholder="Name" class="demoInputBox"required="required"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                                      <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" class="demoInputBox"required="required"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                      <input class="form-control"class="demoInputBox" type="email" name="userEmail" id="userEmail" placeholder="E-mail" required="required"/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div class="form-group">
                                      <textarea class="form-control"class="demoInputBox" name="content" id="content" placeholder="Your Message" required="required"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <div class="col">
                                    <div>
                                      <label>Attachment</label><br /> <input type="file"
                                      name="attachment[]" class="demoInputBox" multiple="multiple">
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col">
                                    <button class="btn btn-info" type="submit" value="Send" class="btnAction">Send</button>
                                  </div>
                                </div>
                              </form>
                              <div id="loader-icon" style="display: none;">
                                <img src="LoaderIcon.gif" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card-body">
                              <p class="mb-0"><strong>Address </strong></p>
                              <p class="pb-2">Karangsalam RT 01 / RW 03, Susukan District, Banjarnegara Regency, Central Java, Postal Code 53475</p>
                              <p class="mb-0"><strong>Phone Number</strong></p>
                              <p class="pb-2">+62877-8195-5877</p>
                              <p class="mb-0"><strong>Email</strong></p>
                              <p>notosetiyo8@gmail.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <footer class="footer">
      
        <div class="text-center text-muted">
          <p>&copy; <b>Mr.Oton.</b> All rights 2019.<br></p>
        </div>
      </footer>
      <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
      
      <script type="text/javascript">
        $(document).ready(function (e){
          $("#frmEnquiry").on('submit',(function(e){
            e.preventDefault();
            $('#loader-icon').show();
            var valid;	
            valid = validateContact();
            if(valid) {
              $.ajax({
                url: "kirim.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                  $("#mail-status").html(data);
                  alert("Your email will be sent??");
                  $('#loader-icon').hide();
                },
                error: function(){} 	        
                
              });
            }
          }));

          function validateContact() {
          var valid = true;	
          $(".demoInputBox").css('background-color','');
          $(".info").html('');
          $("#userName").removeClass("invalid");
          $("#userEmail").removeClass("invalid");
          $("#subject").removeClass("invalid");
          $("#content").removeClass("invalid");
          
          if(!$("#userName").val()) {
            $("#userName").addClass("invalid");
            $("#userName").attr("title","Required");
            valid = false;
          }
          if(!$("#userEmail").val()) {
            $("#userEmail").addClass("invalid");
            $("#userEmail").attr("title","Required");
            valid = false;
          }
          if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            $("#userEmail").addClass("invalid");
            $("#userEmail").attr("title","Invalid Email");
            valid = false;
          }
          if(!$("#subject").val()) {
            $("#subject").addClass("invalid");
            $("#subject").attr("title","Required");
            valid = false;
          }
          if(!$("#content").val()) {
            $("#content").addClass("invalid");
            $("#content").attr("title","Required");
            valid = false;
          }
          
          return valid;
        }
        });
      </script>

      <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
      <script>
          particlesJS.load('particles-js', 'particles.json',
          function(){
              console.log('particles.json loaded...')
          })
      </script>
      <script src="js/core/jquery.3.2.1.min.js"></script>
      <script src="js/core/popper.min.js"></script>
      <script src="js/core/bootstrap.min.js"></script>
      <script src="js/now-ui-kit.js?v=1.1.0"></script>
      <script src="js/aos.js"></script>
      <script src="scripts/main.js"></script>
    </body>
  </html>