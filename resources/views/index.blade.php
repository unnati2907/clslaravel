<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">
    <title> Complete Legal Solution - Lawyers and Law Firm </title>
    <link href="html/juristic-live-cp/assets/images/CLS-Trans-2.png" rel="icon">
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .section-title-s3 img {
            width: 250px;
        }

        .section-title-s3>span {
            font-size: 1rem;
        }

        form {
            text-align-last: center;
        }

        .section-padding {
            margin: 0px 60px;
            padding: 40px 0px;
        }

        .section-title-s3 h2 {
            font-size: 2.5rem;
        }

        body,
        p {
            font-size: 1rem;
        }

        .theme-btn {
            background-color: #707070;
        }

        .accept-btn:hover {
            background-color: #078545;
        }

        .decline-btn:hover {
            background-color: #e00d0d;
        }

        @media (max-width:650px) {
            form {
                display: flex;
            }

            .section-padding {
                margin: 0px 30px;
                padding: 40px 0px;
            }
        }
    </style>
</head>

<body>

    <!-- start case-studies-section -->
    <section class="case-studies-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div class="section-title-s3">
                        <img src="html/juristic-live-cp/assets/images/CLS-Trans-2.png" alt>

                        <!-- <div class="icon">
                                <i class="fi flaticon-suitcase"></i>
                            </div> -->
                        <!-- <span>Chhattisgarh 1st LLP Law Firm - Since 2014</span> -->
                        <h2>Disclaimer</h2>
                        <p>The rules of the Bar Council of India prohibit law firms from soliciting work or advertising in
                            any manner. Complete Legal Solutions LLP ("CLSLLP") does not intend to solicit clients or
                            advertise through this website. By clicking, "I Agree" below, you acknowledge that:
                            <br>You are accessing www.clsllp.com to gain more information about the Firm, its practice areas,
                            and its team for your own information and use. Any article or blog posts or news posted on the
                            website are only informational and do not constitute legal advice. There has been no solicitation,
                            advertisement, or inducement by CLSLLP into visiting the website.
                            <br>Any information obtained or extracted from the website does not constitute legal advice, and it
                            does not create any lawyer-client relationship with you. Please be warned that any information
                            shared with CLSLLP using contact details from the website without a pre-approved and existing
                            lawyer-client relationship may be susceptible to the risk(s) of disclosure. Confidentiality
                            obligations do not apply to any information you share through this website.
                            <br>CLSLLP shall not be liable for the consequences of any action you take by relying on the
                            information provided on this website. If you require any assistance, you must seek independent
                            legal advice.
                            The Firm owns the intellectual property rights to the website's contents.
                        </p>

                    </div>
                    <form>
                        <!-- <button type="button" class="theme-btn disclaimer-accept-btn">Agree</button>    -->
                        <!-- <a href="https://www.completelegalsolution.programmics.tech/home.html" class="theme-btn accept-btn">Accept</a> &emsp; -->
                        <a href="{{url('/home')}}" class="theme-btn accept-btn">Accept</a> &emsp;


                        <a href="https://www.google.com/" class="theme-btn decline-btn">Decline</a>
                    </form><br>
                </div>
            </div>
        </div>
        <!-- end container -->
        <!-- <div class="content-area">
        <div class="case-studies-grids case-studies-slider">
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-1.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-2.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-3.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-4.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-5.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="img-holder">
                    <img src="html/juristic-live-cp/assets/images/case-studies/img-1.jpg" alt>
                </div>
                <div class="overlay">
                    <div class="content">
                        <p class="cat">Law service</p>
                        <h3><a href="#">Personal Injury</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
        <!-- end case-studies-section -->

        <script>
            // $(document).ready(function(){
            // $("#myModal").modal('show');
            // });
            // $(document)
            var acceptbtn = getCookie("cname");
            // alert(acceptbtn);
            if (!acceptbtn) {
                $("#myModal").modal('show');
            }
            $(".disclaimer-accept-btn").click(function() {
                // alert("The paragraph was clicked.");
                setCookie("cname", "disclaimer-modal", 30)
                $("#myModal").modal('hide');
            });

            function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                let expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }

            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
        </script>
        <script src="" async defer></script>
</body>

</html>