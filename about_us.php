<!--NAVBAR-->
<?php include 'header.php' ?>

<!doctype html>
<style>
    .about1
    {
        background-color: cadetblue;
        height: 300px;
        color: white;
        text-align: center;
        font-family: 'Playfair Display';
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about2
    {
        display: flex;
        justify-content: center;
        align-items: center;   
        background-color: #F0F7F7;
        color: #424A4f;
    }
    .about2 p
    {        
        font-family: 'Varela Round', sans-serif;
        font-size: 20px;
        text-align: center;
        padding-top: 50px;
        padding-bottom: 50px;
        font-weight: 300;
        
    }
    .about3
    {
        height:400px;
        background-color: #dfeeee;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about3 p
    {
        font-family: 'Varela Round', sans-serif;
        color: #424A4f;
    }
    .about4
    {
        height:400px;
        background-color: #F0F7F7;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about4 p
    {
        font-family: 'Varela Round', sans-serif;
        color: #424A4f;
    }
    .about5
    {
        height:400px;
        background-color: #dfeeee;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .about5 p
    {
        font-family: 'Varela Round', sans-serif;
        color: #424A4f;
    }
    
    
    /*FOR MOBILE*/
    @media only screen and (max-width: 1000px) {
        .about2
        {
            height:auto!important;
        }
        .about3
        {
            height:auto!important;
        }
        .about4
        {
            height:auto!important;
        }
        .about5
        {
            height:auto!important;
        }
        .about3_container
        {
            padding-top: 50px!important;
            padding-bottom: 50px!important;
        }
        .about4_container
        {
            padding-top: 50px!important;
            padding-bottom: 50px!important;
        }
        .about5_container
        {
            padding-top: 50px!important;
            padding-bottom: 50px!important;
        }
        .about_us .col-md-4
        {
            padding-top: 50px!important;
            padding-bottom: 50px!important; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!--MAIN CSS-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--GOOGLE FONNTS-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        
        <!--ICON & TITLE-->
        <link rel="icon" href="assets/icon.png">
        <title>Books Online</title>
        
        <!--FONTAWESOME-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        
        <section  class="about_us">
            <div class="container-fluid" style="margin-top:70px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row about1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="width:100%; font-size: 50px; font-weight:500; letter-spacing: 0.2rem;">- Our Story -</p>
                                        <p style="font-size:22px; ">We know BooksOnline . In fact, we wrote the blog on it.</p>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                        <div class="row about2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 mx-auto">
                                        <p>At Books Online, we believe there is a better way to do marketing. A more valuable, less invasive way where customers are earned rather than bought. We're obsessively passionate about it, and our mission is to help people achieve it. We focus on supporting the leaders of tomorrow . It's one of the least understood and least transparent aspects of great marketing, and we see that as an opportunity: We're excited to simplify BookOnlinefor everyone through our software, education, and community.</p>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="row about3">
                            <div class="container">
                                <div class="row about3_container">
                                    <div class="col-md-4">
                                        <img src="assets/about_us/about1.svg" width="300" height="300">
                                    </div>
                                    <div class="col-md-8">
                                        <p style="font-size:35px; font-family:'Playfair Display'; letter-spacing:0.1rem;">Our Founding</p>
                                        <p style="font-size:18px;">Books Online was founded by Juvairiya Fathima  in 2019. It was called Books Online, and started as a blog and an online community where some of the world's first BookOnline experts shared their research and ideas. We launched the Beginner's Guide to Book Online and our first Search Ranking Factors study, and that hub of industry expertise transformed into a small consulting firm and led us to create some of our first BookOnline tools.</p>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="row about4">
                            <div class="container">
                                <div class="row about4_container">
                                    <div class="col-md-8">
                                        <p style="font-size:35px; font-family:'Playfair Display'; letter-spacing:0.1rem;">Early Growth and Funding</p>
                                        <p style="font-size:18px;">After a glimpse of the demand, we shifted our focus from consulting to our software, taking our first round of funding in 2027 to power the development of new tools and ideas. By 2029, we tallied our first 5,000 subscribers and codified our core values in the acronym TAGFEE, continuing to lead the industry with our educational content in an effort to demystify BookOnline(this is also when we started filming Whiteboard Fridays!).</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="assets/about_us/about2.svg" width="300" height="300">
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="row about5">
                            <div class="container about5_container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="assets/about_us/about3.svg" width="300" height="300">
                                    </div>
                                    <div class="col-md-8">
                                        <p style="font-size:35px; font-family:'Playfair Display'; letter-spacing:0.1rem;">A new leaf</p>
                                        <p style="font-size:18px;">With our broader marketing efforts in full swing, we rebranded from Books Online to Books Online in 2023. We released a suite of campaign-based tools called Books Online Analytics that included features for content, social media, and brand management in addition to links and rankings. We also celebrated 10 years in search and welcomed long-time Books Onlinezer Sarah Bird as our new CEO.</p>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--FOOTER-->
        <?php include 'footer.php'; ?>
    </body>
</html>