<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Formula 1 Teams - Commentary</title>

        <meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>

	<body>
		<?php include "../navbarInclude.php"; ?>

        <div class="container">
        	<h4>Week 1</h4>

        	<h5>At the heart of any HTML5 frameworks is a grid system. Summarise the grid system you will use in Bootstrap.</h5>

        	<p>A 3 by 4 grid system will be used to display the 12 items. The "col-sm-3" class will ensure each column is evenly spaced and is responsive. I used the class "sm" as it makes sure the page is responsive for small sized devices, this also includes medium and large sized devices. In the head of each page I set the initial scale value and width value to tell bootstrap how to display the responsive grid</p>

        	<h5>Menu systems are often a bind to get right especially if you want a multi-dropdown menu. In an ideal world you should write the HTML for a menu as a set of hierarchical un-numbered lists. Summarise how you will implement menus in your site using Bootstrap.</h5>
        	<p>First, all the menus will be coded with HTML, using li and ul tags. Using Bootstrap classes such as "navbar" and "nav-item", the menu can be made responsive. I can also use Bootstrap to force the menus to change state when the window is resized, e.g. from a navbar to a burger icon.</p>

        	<h5>Pick out 5 further features, other than grid and menu, in Bootstrap that you think will be useful. Comment on their use.</h5>
        	<p><b>Jumbotrons:</b> Jumbotrons can be used to clearly and easily show the subject matter of a page or specific section. They can also be used to highlight any object.<br>
        	<b>Alerts:</b> Alerts can be used to notify the user when a comment has been succcesfully posted, or they have logged in and are away to be redirected.<br>
        	<b>Forms:</b> Bootstrap forms will be used for the user login system, to create an easy and simple form for the user.<br>
        	<b>Media objects:</b> Media objects can be used alongside containers to format and create a good looking commenting system<br>
        	<b>Buttons:</b> Buttons will help with navigation around the website, and can be used alongside menus. </p>
        </div>

        <div class="container">
        	<h4>Week 2</h4>

            <h5>Write out the definition of all tables within your database from the tutorial including the items, images, articles, users and comments.</h5>

            <p>I have an Items table, this contains the Title, and Description of the Item, alongwith an ItemNo (ItemID). In my Images table I hold the ImageNo, Title and the ImagePath (on the server). In Articles, I have the ArticleNo, Title, Author and the Text within the article. Users contains UserNo, Username and Password (which will most likely be updated to a hashed password when security is implemented). And the Comments table holds CommentNo, UserNo and ArticleNo.<br>
            Since Articles and Images have to be linked, I created a RelatedImagesArticles table which holds the ImageNo and ArticleNo, this allows me to use inner joins to retrieve the ImagePath just from the ArticleNo. I also did the same with Items and Images.</p>

            <h5>For each attribute in a table give the datatype.</h5>
            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/Items.PNG">
                </div>

                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/Images.PNG">
                </div>

                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/Articles.PNG">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/RelatedImagesItems.PNG">
                </div>

                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/RelatedImagesArticles.PNG">
                </div>

                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/Users.PNG">
                </div>

                <div class="col">
                    <img class="img-fluid" src="../CommentaryPictures/Comments.PNG">
                </div>
            </div>

            <h5>Give 3 examples, preferably related to the site, of issues with the relational database model.</h5>
            <p>One example of a limitation is the restrictions on field lengths. Relational databases forces the creator to specify a size for each data field. This can cause numerous problems such as data being too big for a field, resulting in the loss of that data. Or the data being too small which means some storage space is wasted.<br>
            Another example of a limitation is, they can be complicating to intially set up. Relational databases require everything to be done correctly from the start, if there is an error, then most times the database has to be re-created.<br>
            A final issue with relational databases, is when using queries to retrieve data, it can take a lot of joins in order to get the specific field of data. This can get quite confusing and eventually be inefficient.</p>
        </div>

        <div class="container">
            <h4>Week 3</h4>

            <h5>You need to add 400 words of appraisal of the work carried out this week. Pick one of the API methods and describe how this works. Then show where this has been used within the “view” code. Are you convinced that an API is a good idea? The answer is YES, give a couple of reasons why!!</h5>

            <p>One of the API methods I used in the website is getAllItems(). getAllItems() contains an INNER JOIN query that grabs the Title and Description from the Items table, and the ImagePath from the Images table. The results from this query are stored in an array, which is then encoded into JSON. My Week03 page, which is stored in the View folder, communicates with the API using a PHP include statement. When the Week03 page receives encoded JSON array, it decodes it and saves it in a new variable. In order to display the JSON correctly, I used two loops to keep the responsive grid structure, I also created a counter which points to a specific index in the JSON array to display the respective Titles, Desciptions and ImagePaths.</p>

            <p>I think that using an API is a good idea. Having a number of functions in an API keeps the code cleaner and easier to understand, along with making file storage easier. An API also helps with automation, as it means there is no need to update numerous files with new functions, which also increases efficiency when creating a system.</p>
        </div>

        <div class="container">
            <h4>Week 4</h4>

            <h5>Consider the security aspects that you have put into your site which is just to protect the comments section. What if you were selling items from your site? Talk a bit about whether the security you have on your site is sufficient; and outline any improvements for a selling site. (300 words)</h5>

            <p>One security aspect that is part of the comments, is hiding the user and article ID which is used in the comment query using post methods and session variables. Another security aspect, is using the post method for submitting the form, as post is more secure due to the data never being visibily available in the logs or URL. Prepared queries are also used when submitting comments, which prevents SQL injection. Only users that are logged in are allowed to comment and users passwords are hashed and salted. One thing I could do to improve security is to implement a Google Captcha in order to prevent spam and bots.</p>

            <p>If the website was selling products, it would also most likely be storing credit card info, home addresses and other sensitive information. Which would need to be stored securely and temproarily. No credit card info should ever be stored in a cookie or session. Two factor authentication could be used when registering and signing in to reduce the risk of accounts being hacked.</p>

            <h5>Discuss clearly how you would set the session maximum length to 5 mins. (100 words)</h5>

            <p>The best way to change the session maximum length is to hard code it in the ini file. However access to the ini file isn't always possible. An alternative is to use the ini_set() PHP function, where the targeted parameter is specified, along with the value.</p>
        </div>

        <div class="container">
            <h4>Week 5</h4>

            <h5>Show how you have made the form safe</h5>

            <p>The form uses regular expressions on each input to prevent any incorrect inputs, such as an email address with no "@" character or a phone number with the incorrect number of digits. The post method is used to make sure none of the submitted credentials are visible in the URL. The registration form uses a confirm password field and JavaScript ensures both passwords match before the form is submitted. Google ReCaptcha v3 is used on both forms to prevent bots and spam from accessing the website. There is also a password strength meter on the registration form to allow the user to judge how secure their password is.</p>

            <h5>Highlight 4 security features that add to your site or are weak within your site.</h5>

            <p><ol>
                <li>Google ReCaptcha v3 is the main security feature of the website. It monitors the activity users and uses that data to decide if they are a bot or not.</li>
                <li>Encryption is another main feature of the site. When a user registers, passwords are hashed and salted before being sent to the database.</li>
                <li>When registering, users are able to see the strength of their password, shown by a visual meter and a string output.</li>
                <li>Prepared statements are used to prevent SQL injection when entering data to the database.</li>
            </ol></p>
        </div>
	</body>
</html>