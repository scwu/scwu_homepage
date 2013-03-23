<!Doctype HTML>
<html>
<head>
	<title>Shin-Yuan Clara Wu: developer; designer; photographer; student</title>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css"> </link>
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">


<script>
  function sendAlert() {
    alert("If the email was submitted correctly, you will be redirected to the homepage. Thank you!");
  }
</script>
</head>

<body>
  <div class="full">
	<img alt="full screen background image" src="images/beach.jpg" id="full-screen-background-image" /> 
	 <div class="title">
	   <h1>Hi, I'm Clara Wu.</h1>
	 </div>
	
	 <div class ="body">
		  <div class = "text">
			 <p>I'm a <a href="http://mkse.upenn.edu">Networked and Social Systems Engineering</a> <em>student</em> at the University of Pennsylvania. I'm an aspiring <em>developer</em> who likes to build cool things that interest me in my spare time. I love big data and I'm interested in the implications it has for us and how we live our lives. I take <em>photos</em> for myself and the Daily Pennsylvanian. I also appreciate great <em>design</em>. </p>
        <p>When I'm not studying, building, shooting or designing, I like books, tech,  politics, education, Ira Glass and Apple.</p>
        <p>I'm young, humble and eager to learn. Please get <a href="mailto:s.clara.wu@gmail.com">in touch</a>!
		  </div>
		
		  <div class = "social">
			 <a href= "http://www.github.com/scwu">
             <img alt="github" src="images/github.png" />
        </a>
        <a href = " http://www.twitter.com/s_clara_wu">
             <img alt = "twitter" src="images/twitter.png"/>
        </a>
        <a href= "http://www.flickr.com/clarrra">
              <img alt= "photos" src = "images/flickr.png"/>
        </a>
        <a href= "http://www.facebook.com/s.clara.wu">
              <img alt = "facebook" src= "images/facebook.png"/>
        </a>
        <a href= "http://quora.com/Clara-Wu">
               <img alt = "quora" src = "images/quora.png"/>
        </a>
         <a href= "mailto:s.clara.wu@gmail.com">
               <img alt = "email" src="images/email.png"/>
        </a>
        <a href = "../images/resume.pdf">
              <img alt= "resume" src="images/resume.png"/>
       </a>
		  </div>
    </div>
    <div class= "menu">
      <a href="#projects" id= "project" class = "button">Projects</a>
      <a href="#photos" id= "photo" class = "button" >Photos</a>
      <a href= "#blogs" id="blog" class="button">Blog</a>
      <a href = "#contact_me" id = "contact" class = "button">Contact</a>
    </div>
	</div>
</div>

<div class= "project" id="project">
  <div class="title_project">
    <h2>What I've worked on (and am working on)</h2>
  </div>
  <div class= "body_project">
    <table border="0">
      <tr>
        <td><img src="images/screenshot2.png"></td>
        <td><h3><a href="http://www.github.com/scwu/GroceryShare">GroceryShare</a></h3><p>Made for the PennApps Fall2012 Hackathon.
        An easy way to share groceries with your Facebook friends. Pick a recipe. 
        GroceryShare checks for ingredient matches with your friends.</p><p><em> Python/Django, HTML, CSS, JS</em></p></td>
      </tr>
      <tr>
        <td><img src="images/screenshot3.png"></td>
        <td><h3><a href="http://www.github.com/scwu/Evernote-Blog-Engine">EverBlog</h3></a>
                <p>I was looking for a seamless way to translate my thoughts to a blog, even when I wasn't online. I'm a huge fan of 
                  Evernote and I use it frequently to jot down notes where ever. I thought it'd be a great thing to combine the two
                  together and thus came EverBlog. Essentially, I created a blog engine that uses Evernote as it's CMS.</p> <p><em>Python/Flask/JS/HTML/CSS</em> </p> </td>
      </tr>
      <td><img src="images/screenshot4.png"></td>
      <td><h3><a href="http://www.github.com/scwu/NYTCombinator">New York Times Combinator</a></h3>
              <p>I wanted an easy way to scroll through the New York Times for five minutes everyday.
                But flipping from page to page was a huge hassle, especially with the paywall so I created NYTCombinator, a Hacker News Style
                app that makes it as simply as clicking Read More. No more paywall concerns.</p>
              <p>Some things I hope to include are weighted articles that could be sorted in ascending order. I'm currently working on this
              based on user comments and "key words" but I would like to implement a more intelligent approach with certain commenters getting more weight than others.</p>
              <p><em>Perl/Dancer/JavaScript/JQuery/HTML/CSS</em></p>
      </td>
      </tr>
      <tr>
      <td><img src="images/screenshot1.png"></td>
      <td><h3><a href="http://www.github.com/scwu/scwu_homepage">Personal Portfolio</a></h3>
      <p>I use my own personal website as a kind of creative pallete. I am constantly looking to redesign it and try new things. For my personal website,
      the focus isn't on my code, but instead, human intuition and beautiful design. I've played around with a bunch of different styles at this point. 
      And the project that is my personal website, is on some ways, my favorite.</p>
      <p>PHP/HTML/CSS/Javascript/JQuery</p>
      </td>
      </tr>

      <tr>
      <td><img src="images/screenshot5.png"></td>
      <td><h3><a href="http://www.github.com/scwu/Socialrank">Social Rank for MKSE212</a></h3>
      <p>Calculated the equivalent of page rank of the entire livejournal userbase. This was run in a map-reduce framework (Hadoop) and I wrote it entirely in Java.
      I also implemented a few other features including calculating which users relationships were bidirectional and continued to calculate the PageRank until it was 
      normalized (ran a separate job to check this). This was done on Amazon's EC2. Then, I visualized the relationship in a GWT webapp I created for the class.</p>
      <p><em>Java/Hadoop/HTML/CSS</em></p>
      </td>
      </tr>
    </table>
  </div>
</div>

<div class = "photo" id ="photo">
  <div class = "title_photo">
    <h2>Photos (taken lovingly from my Flickr)</h2>
  </div>
  <div class="body_photo">
    <?php 
    require('photos.php'); 
    ?>
  </div>
</div>

<div class = "blog" id = "blog">
  <div class = "title_blog">
    <h2>A snippet of my <a href="http://thisside0fparadise.tumblr.com">TumbleBlog</a> (a mashup of a million different things, me)</h2>
  </div>
  <div class="body_blog">
    <script type="text/javascript" src="http://thisside0fparadise.tumblr.com/js"> </script>
  </div> 
</div>
<div class="contact" id = "contact">
  <div class="title_contact">
    <h2>Contact Me</h2>
  </div>
  <div class="floater"></div>
  <div class="body_contact">
    <form name="contact_form" method="post" action="send.php">
        <p class = "name">
          <input type="text" name="name" value = "name" onFocus="this.value=''; return false">
        </p>
        <p class= "email">
             <input type="text" name="email" value = "email" onFocus="this.value=''; return false">
        </p>
        <p class="url">
          <input name="url" />
        </p>
        <p class = "comments">
            <textarea  name="comments" value = "comments"></textarea>
        </p>
        <p class= "submit">
            <input type="submit" value="Submit" class = "submit" onClick="sendAlert()">  
        </p>
    </form>
  </div>
</div>
</body>
</html>
