<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unilink Main Page</title>
    <link rel="stylesheet" href="../../css/landing.page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  </head>
  <body>

    <header>
      <a href="#" class="brand">Unilink Smart Solutions</a>
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="#">Home</a>
          <a href="php/views/about.php">About</a>
          <a href="php/views/contact.us.php">Contact</a>
          <a href="php/login.php">Login</a>
        </div>
      </div>
    </header>

    <section class="home">
      <video class="video-slide active" src="../../images/unilink3.mp4" autoplay muted loop></video>
      <video class="video-slide" src="../../images/unilink5.mp4" autoplay muted loop></video>
      <video class="video-slide" src="../../images/unilink3.mp4" autoplay muted loop></video>
      <video class="video-slide" src="../../images/unilink5.mp4" autoplay muted loop></video>
      <video class="video-slide" src="../../images/unilink3.mp4" autoplay muted loop></video>
      <div class="content active">
        <h1>Smart Energy and Water Meters.<br><span>Our Goal?</span></h1>
        <p>At Unilink Smart Solutions, we provide state-of-the-art smart energy and water meters that allow you to monitor your consumption in real-time. Our meters provide accurate readings, which help you to make informed decisions on how to save energy and reduce your water usage. By using our smart meters, you can easily track your energy and water usage, helping you to save money and reduce your carbon footprint.</p>
        <a href="php/views/place-order.php">Place Order</a>
      </div>
      <div class="content">
        <h1>Our Company.<br><span>What sets us unique?</span></h1>
        <p>Unilink Smart Solutions Pty(Ltd) is a leading provider of smart energy and water meters. We are committed to delivering reliable and high-quality solutions to our customers. Our team is made up of experts in the field, who have years of experience in designing and installing smart meter solutions. We believe that our customers come first, and we strive to provide the best possible service and support.</p>
        <a href="php/views/place-order.php">Place Order</a>
      </div>
      <div class="content">
        <h1>Our Products.<br><span>What we offer</span></h1>
        <p>At Unilink Smart Solutions, we offer a wide range of smart energy and water meters to suit your needs. Our meters are designed to be user-friendly, easy to install and integrate with other devices. Our products include smart electricity meters, water meters, gas meters and more. All of our meters are designed to be accurate and reliable, providing you with real-time data to help you save energy and water.</p>
        <a href="php/views/place-order.php">Place Order</a>
      </div>
      <div class="content">
        <h1>Benefits of smart meters.<br><span>Why buy it?</span></h1>
        <p>Smart energy and water meters provide a range of benefits for both the environment and the consumer. By monitoring your usage, you can identify where you are using the most energy and water, and take steps to reduce your consumption. This helps to save money on bills, while also reducing your carbon footprint. Our smart meters also offer features such as real-time data, alerts, and notifications, which help you to stay informed about your usage and make changes accordingly.</p>
        <a href="php/views/place-order.php">Place Order</a>
      </div>
      <div class="content">
        <h1>Installation process.<br><span>How to Get Started?</span></h1>
        <p>Getting started with Unilink Smart Solutions is easy. Simply click on the place order button below and our team will contact you and provide you with a tailored solution that fits your needs. We offer installation, support, and maintenance services to ensure that your smart meter is working efficiently and accurately. With our help, you can start saving money and reducing your energy and water consumption today.</p>
        <a href="php/views/place-order.php">Place Order</a>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>
    </section>

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    //Javacript for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual){
      btns.forEach((btn) => {
        btn.classList.remove("active");
      });

      slides.forEach((slide) => {
        slide.classList.remove("active");
      });

      contents.forEach((content) => {
        content.classList.remove("active");
      });

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });
    </script>

  </body>
</html>
      