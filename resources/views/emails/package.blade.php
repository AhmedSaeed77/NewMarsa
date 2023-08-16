<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .confirmation {
        max-width: 1024px;
        margin: 0 auto;
        padding: 10px;
        padding-top: 50px;
        font-family: sans-serif;
      }

      .confirmation-heading {
        padding: 20px;
        border: 3px solid #dbdbdb;
        text-align: center;
        margin: 0;
      }
      .confirmation-gradient {
        background: #e55d87; /* fallback for old browsers */
        background: -webkit-linear-gradient(
          to right,
          #8a54ff,
          #5ddee6
        ); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(
          to right,
          #8a54ff,
          #5ddee6
        ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: #fff;
      }
      .confirmation-body {
        padding: 20px;
        border: 3px solid #dbdbdb;
        margin-bottom: 60px;
      }
      .confirmation-body--1 p {
        text-align: start;
        font-size: 18px;
        font-weight: bold;
      }
      .confirmation-body--2 p {
        text-align: center;
        font-size: 21px;
        font-weight: 800;
      }
      .m-small {
        margin-bottom: 10px;
      }
      .m-large {
        margin-bottom: 20px;
      }
      .confirmation-info {
        position: relative;
      }
      a.explore-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        color: #000;
        font-size: 24px;
        margin: 10px 0px 10px auto;
        font-weight: 700;
        width: 87px;
        height: 50px;
        padding: 6px 66px 0px 66px;
        background: #ffffff; /* fallback for old browsers */
        background: -webkit-linear-gradient(
          to right,
          #d9d9d9,
          #004aad
        ); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(
          to right,
          #d9d9d9,
          #004aad
        ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: #fff;
        border-radius: 50px;
      }

      .confirmation-social {
        position: relative;
      }
      #links {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin: 30px 0px;
      }
      #links a {
        text-decoration: none;
        color: #000;
        font-size: 17px;
        font-weight: 700;
        display: flex;
        align-items: center;
      }
      #links a svg {
        width: 50px;
        margin-right: 12px;
      }
      .confirmation-footer {
        display: flex;
        justify-content: space-between;
        border: 3px solid #dbdbdb;
      }
      .confirmation-footer a {
        border-right: 3px solid #dbdbdb;
        padding: 20px;
        width: 100%;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
        color: #000;
      }
      @media screen and (max-width: 768px) {
        .confirmation-footer {
          flex-direction: column;
        }

        #links {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  
  <body>

    <div class="confirmation">
      <img
        src="https://marsawaves.com/back/public/newlogofooter1.png"
        alt=""
        style="
          display: block;
          margin: 0 auto;
          margin-bottom: 50px;
          width: 200px;
        "
      />
      <h1 class="confirmation-heading" style="font-size: 24px">Marsa Waves Confirmation</h1>
      <h2 class="confirmation-gradient confirmation-heading">Thanks to Choose Marsa Waves as a Partner in your next Advanture</h2>
      <div class="confirmation-body confirmation-body--1">
        <p>Tour Name: {{ $data->activityName }}</p>
            <p>Travel Date: {{ $data->activity_date }}</p>
            <p>Travelers: {{ $data->adult_num }} Adults , {{ $data->child_num }} Child , {{ $data->infant_num }} Infant</p>
            <p>Tour Grade Description: Pickup included</p>
            <p>Pick Up Location : {{ $data->location }}</p>
            <p>Tour Language: English- Guide</p>
            <!--<p>Location: Marsa Alam, Red Sea , Egypt</p>-->
            <p>Rate: USD {{ $data->total_price }}</p>
      </div>
      <h2 class="confirmation-gradient confirmation-heading">Have questions or need help?</h2>
      <div class="confirmation-body confirmation-body--2">
        <p>Feel Free to Ask Us About Anything Anytime</p>
        <p>what's app +2 010 1111 7381</p>
        <p>Email : <a href="mailto:info@marsawaves.com"></a> info@marsawaves.com</p>
      </div>
      <div class="confirmation-info" class="m-large">
        <img src="https://marsawaves.com/back/public/newinformation.png" alt="" width="100%" />
      </div>
      <a href="https://marsawaves.com/" target="_blank" class="explore-btn">Explore</a>
      <div class="confirmation-social m-large">
        <img src="https://marsawaves.com/back/public/newscocial.png" alt="" width="100%" />
      </div>
      <div id="links" class="links">
        <a href="https://www.tripadvisor.com/Attraction_Review-g311425-d23031566-Reviews-Marsa_Waves_tours_Marsa_Alam-Marsa_Alam_Red_Sea_and_Sinai.html/" target="_blank" style="padding-bottom: 16px;">
          <img src="https://marsawaves.com/back/public/trip.png" style="width:30px;padding-right:20px">Marsa Waves tours</a>
        <a href="https://www.instagram.com/marsa_waves/" target="_blank" style="padding-bottom: 16px;">
                   <img src="https://marsawaves.com/back/public/insta.png" style="width:30px;padding-right:20px">Marsa_Waves</a>
        <a href="https://www.facebook.com/marsawaves/" target="_blank" style="padding-bottom: 16px;">
                   <img src="https://marsawaves.com/back/public/facebook.png" style="width:30px;padding-right:20px">Marsawaves</a>
        <a href="https://youtube.com/@marsawaves/" target="_blank" style="padding-bottom: 16px;">
                  <img src="https://marsawaves.com/back/public/youtube.png" style="width:30px;padding-right:20px">Marsawaves</a>
      </div>

      <footer class="confirmation-footer">
        <a href="https://marsawaves.com/" target="_blank">Tours & Activities</a>
        <a href="https://marsawaves.com/" target="_blank">Help Center</a>
        <a href="https://marsawaves.com/" target="_blank">Terms and policies</a>
      </footer>
    </div>

  </body>

</html>

