<?php
session_start();
if(isset($_SESSION['isLoggedIn'])){
   header('location:home.php');
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>WELCOME TO Earning site</title>
    <style>
        body {
            overflow-x: hidden;
            background-color: rgb(25, 25, 69);
        }
        /* Styling for the container */
        .container {
            display: flex;
        }

        /* Styling for the content area */
        .content {
            flex: 1;
            background-color: rgb(25, 25, 69);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto; /* Add scroll bar if content overflows */
        }
        /* Styling for the main content */
        h1 {
            color: #3498DB; /* Bright Blue */
            color: white;
        }
        p {
            color: white;
        }
        .welcome{
           margin-left: 7%
        }
        /* Styling for the cards (updated) */
        .card {
           /*  width: calc(33.33% - 40px); */ /* Three cards in a row with spacing */
            width: min-content;
            margin: 20px;
            padding: 20px;
            background-color: #ECF0F1;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .card img {
            
            height: 300px;
        }
        .card h2 {
            color: #3498DB; /* Bright Blue */
        }
     .card p {
            color: #555;
        }
        .b {
            margin-left:30%;
            background-color: #3498DB;
            color: #ECF0F1;
            /* text-decoration: none; */
            font-size: 20px;
            padding: 16px 20px;
            border: 1px solid white;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 5px 5px 40px gray;
            transition:all 0.15s ease;
        }
        .b:active {
            transform: scale(0.85);
        }
        #h:hover{
        box-shadow: none;
    }
        .top-cont {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .left-cont {
            display: flex;
            flex-direction: column;
            align-content: space-around;
            gap: 50px;
        }
        .ads-content{
            display: grid;
            grid-template-columns: repeat(3,1fr);
            grid-template-rows: repeat(2,1fr);
            margin: 15px;
        }      
    </style>
</head>
<body>
        <div class="content">
            <div class="top-cont">
                <div class="left-cont">
                    <h1 class="welcome">Welcome to Earning Site</h1>
                    <p class ="welcome">This is the main content of the website. You can add your earning-related information and content here.</p>
                    <div><button class="b" onclick="location.href='login_form.php'" > Sign IN </div>
                    <div><button class="b" onclick="location.href='register_form.php'" > Sign UP</div>
                </div>
                <div><img src="ern1.jpg" alt="" width="86%" height="90%"></div>
            </div>
             
           <div class="ads-content">
                <!-- Card 1 -->
                <div class="card">
                    <img src="ramit-sethi-premium-courses1.png" alt="Ad 1" width="300px" height="300px">
                    <h2>BLOG 1</h2>
                    <p>Here at Smart Blogger, we make most of our income from online courses and workshops — over $1 million per year — but we are far from the only successful blog doing this. Most of the people making a lot of money from their blogs are doing it through online courses.
                        Ramit Sethi reportedly crossed $10 million dollars in annual revenue with his suite of premium courses:</p>
                </div>
    
                <!-- Card 2 -->
                <div class="card">
                    <img src="e-books-vs-paper-books-which-is-better-for-children.jpg" alt="Ad 2" width="300px" height="300px">
                    <h2>BLOG 2</h2>
                    <p>Quite a few writers have parlayed their blogging success into a major publishing deal. Mark Manson, for instance, published a blog post called The Subtle Art of Not Giving a F*ck in 2015. Millions of readers later, he got a book deal with Harper Collins and went on to sell over 3,000,000 copies in the US alone.</p>
                </div>
    
                <!-- Card 3 -->
                <div class="card">
                    <img src="AFFILATEMARKETING.jpeg" alt="Ad 3" width="300px" height="300px">
                    <h2>BLOG 3</h2>
                    <p>If you'd like to create some passive income streams from your blog, one of the best choices is affiliate marketing — recommending the services, digital products, and physical products of other companies in exchange for a commission.
                        Here at Smart Blogger, we make more than $100,000 per year promoting affiliate products, most of that coming from casually recommending products.</p>
                </div>
                  <!-- Card 1 -->
                  <div class="card">
                    <img src="ADVERTIJING.jpeg" alt="Ad 1" width="300px" height="300px">
                    <h2>BLOG 4</h2>
                    <p>Normally, we're not big fans of selling ads on your site as a monetization strategy. You need roughly a million visitors per year for the large ad networks to take you seriously, and affiliate marketing is almost always more profitable and just as passive.
                        That being said, some niches like recipes, fashion, and news are hard to monetize through many of the other methods mentioned here, and they get LOTS of page views. In that case, putting a few banner ads on your site can make sense as a supplementary income source.</p>
                  </div>
    
                <!-- Card 2 -->
                <div class="card">
                    <img src="ryan-deiss-testimonial.png" alt="Ad 2" width="300px" height="300px">
                    <h2>BLOG 5</h2>
                    <p>If your blog takes off, and you start being recognized as an authority in your space, you might be surprised by how many invitations you get to speak at conferences. And it’s amazingly profitable. I typically make a minimum of $10,000 per speech and it can go as high as $100,000 when you count product sales resulting from the speech.
                        Not bad for a 60-90 minute talk. 🙂</p>
                </div>
    
                <!-- Card 3 -->
                <div class="card">
                    <img src="maria-killam-consultations.png" alt="Ad 3" width="300px" height="300px">
                    <h2>BLOG 6</h2>
                    <p>While this certainly isn’t everyone’s cup of tea, doing a bit of coaching or consulting is an online job that can earn you a surprisingly nice living, even when your audience is small. I rarely do consulting anymore, but the last time I did regularly, I charged $1,000 an hour with a six-month waiting list.
                        But I’m not the only one. Going back to Maria, again, she’s been quite innovative in coming up with ways to do design consultations by photo and email, currently charging $1,275 per room:</p>                </div>
        </div>
    </div>
</body>
</html>