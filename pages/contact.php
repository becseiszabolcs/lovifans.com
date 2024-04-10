<div class="sites wrapper contact">
    <main>
        <section >
        <h1>Website Suggestion and Issues</h1>
        <form action="<?="$_SESSION[R1]/pages/unloged/conn_issu.php"?>" method="post" required>
            <div class="textinputs">
            <input type="text" placeholder="Name" name="name" class="textinput" required>

            <input type="email" placeholder="Email" name="email" class="textinput" required>

            <input type="text" placeholder="Subject" name="subject" class="textinput" required>
            </div>
            <div>
            <textarea placeholder="Text" name="mes" class=""></textarea>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
        </section>


    </main>

    <footer class=" footer-shadow">
        <div class="container text">
        <h1>Contact Us</h1>
        <p>phone: &#9; +36301967672</p>
        <p>email: &Tab; suppot.team@lovifans.com</p>
        <form action='' method="post" class="star-rating" >
            <h1 class=" ">Rate Us</h1>
            <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            <button type="submit" class="rate">Rating</button>
        </form>
        </div>
    </footer>
    </div>
</div>