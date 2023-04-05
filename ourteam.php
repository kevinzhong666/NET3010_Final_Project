<?php include("head.php")?>
        <body>
        <?php include("header.php")?>
        <?php include("nav.php")?>
            <div class="useArea">
                <table border="0">
            <h2 class="text">Meet the Team!</h2>
            <ul>
                <section id="liv">
                    <img src="images/Olivia.png" alt="Olivia image" style="width:100px; height:100px; float:left; padding: 10px 10px 10px 0px">
                    <p class="text">My name is Olivia Taylor and I am currently a 3rd year Network Technology student at Carleton University and I am this group project's 
                                    front-end designer and co-team lead. I created a team google doc where I outlined everything I wanted to be implemented on each page. 
                                    I wrote the informational section on our website and what it has to offer and also wrote and designed the “about our team” section which 
                                    doubles as the contribution breakdown. I have also chosen and uploaded every one of the photographs we have displayed on the website, and 
                                    gave notes on ways to improve the website's design to the frontend developers along the way.
                                    You can contact me with any concerns at: </p>

                    <li class="emailbullets"> Carleton email: <a href="mailto:oliviataylor@cmail.carleton.ca">oliviataylor@cmail.carleton.ca</a></li>
                    <li class="emailbullets"> Algonquin email: <a href="mailto:tayl0649@algonquinlive.com">tayl0649@algonquinlive.com</a></li> </p>
                </section>
                
                <section id="ethan">
                    <img src="images/Ethan.png" alt="Ethan image" style="width:100px; height:100px; float:left; padding: 10px 10px 10px 0px">
                    <p class="text">My name is Ethan Franks and I am currently a 3rd year Network Technology student at Carleton University and I am this group project's co-frontend 
                                    developer and co-team lead. I worked closely with Kevin to implement Olivia’s design and overall look of the website to each page’s front end. I converted all of our original 
                                    HTML to PHP files including snippets (head.php, nav.php, etc.) and code that displays different content based on whether the user was logged in or not. 
                                    I also helped connect the back-end developers’ database to the forms that users see and fill out so that their usernames and info would be acessed/stored properly.

                    <br>
                    I can be reached at:</p>

                    <li class="emailbullets"> Carleton email: <a href="mailto:ethanfranks@cmail.carleton.ca">ethanfranks@cmail.carleton.ca</a></li>
                    <li class="emailbullets"> Algonquin email: <a href="mailto:fran0526@algonquinlive.com">fran0526@algonquinlive.com</a></li> </p>
                </section>
                
                <section id="kevin">
                <img src="images/Kevin.png" alt="Kevin image" style="width:100px; height:100px; float:left; padding: 10px 10px 10px 0px">
                <p class="text">My name is Kevin Zhong and I am currently a 3rd year Network Technology student at Carleton University and I am this group project's co-frontend developer. 
                                I collaborated with Ethan on the project's frontend and focused on integrating the weather API with the CSS and JavaScript. Additionally, I assisted Adeeb 
                                and Tarnvir with debugging the SQL database on the backend.</p> 
                </section>
                
                <section id="tarnvir">
                <img src="images/Tarnvir.png" alt="Tarnvir image" style="width:100px; height:100px; float:left; padding: 10px 10px 10px 0px">
                <p class="text">My name is Tarnvir Hans and I am currently a 3rd year Network Technology student at Carleton University and I am this group project's co-backend developer.
                                I worked with Adeeb to set up the database, and the Sign Up page. We worked on linking the database to the Sign up form and making sure the data was stored 
                                in the correct location. Lastly we worked on the Login page where we had to retrieve the information form the database.</p>
                </section>

                <section id="adeeb">
                <img src="images/Adeeb.png" alt="Adeeb image" style="width:100px; height:100px; float:left; padding: 10px 10px 10px 0px">
                <p class="text">My name is Adeeb Fahim and I am currently a 3rd year Network Technology student at Carleton University and I am this group project's co-backend developer. 
                                I worked closely with Tarnvir to help set up the database, and helped set up the form for the Sign Up page. Within the sign up page, I helped set up the link 
                                between it and the database. Finally, I aided the team in working on retrieving information from the SQL Database and displaying it thru the login page.</p>
                </section>
            </ul>
            <?php include("footer.php")?>
        </body>
    </html>
</DOCTYPE>