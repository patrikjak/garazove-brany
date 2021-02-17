<?php include_once 'partials/header.php'; ?>

    <header id="home">
        <div class="menu">
            <div class="menu-btn">
                <span id="bar1"></span>
                <span id="bar2"></span>
                <span id="bar3"></span>
            </div>
            <div class="row">
                <ul id="menu">
                    <li><a href="#home">Domov</a></li>
                    <li><a href="#about">O nás</a></li>
                    <li><a href="#partners">Partneri</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                </ul>
                <ul id="social-menu">
                    <li><a href="tel:+421949167144">+421 949 167 144</a></li>
                    <li><a href="mailto:petermikovi@gmail.com">petermikovi@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="name">
            <h1>Peter Miškovič</h1>
            <h2>predaj garážových brán na mieru</h2>
        </div>
    </header>
    <section>
        <div id="about" class="about">
            <h1>O nás</h1>
            <p>Ponúkame garážové brány na mieru <b>od slovenského výrobcu</b> s dlhou životnosťou, elektrickým pohonom alebo bez za tú najlepšiu cenu. Brány majú
                pozinkovaný povrch, polyuretánovú vrstvu hrubú 4 cm, sú zateplené a taktiež odhlučnené.</p>
            <p>Pôsobime na celom Slovensku.</p>
            <h2>Cenník</h2>
            <p class="warning">Ceny sú len orientačné. Presné ceny po kontaktovaní.</p>
            <p class="warning">Uvedená cena je v základných farbách (hnedá, biela, antracit)</p>
            <p>Zadajte šírku od 2,4 m do 6 m a výšku od 2 m do 4,5 m</p>
            <div class="form">
                <form method="get" id="basic-price" autocomplete="off">
                    <label for="width">Šírka:</label>
                    <input type="text" id="width" placeholder="Šírka [m]">
                    <label for="height">Výška:</label>
                    <input type="text" id="height" placeholder="Výška [m]">
                    <label for="price">Cena:</label>
                    <input type="text" id="price" disabled value="0 €">
                    <p class="warning" id="wrong-input">Nezadali ste dobré rozmery</p>
                    <input type="submit" id="get-price" value="Vypočítať cenu">
                </form>
            </div>
            <h2>Doplnky</h2>
            <div class="options">
                <input type="radio" id="drevodekor" value="6">
                <label for="drevodekor">Drevodekor - 6 € m<sup>2</sup></label><br>
                <div class="option-val" id="drevodekor-input">
                    <label for="drevodekor-val">Počet m<sup>2</sup>:</label>
                    <input type="text" id="drevodekor-val">
                </div>
                <input type="radio" id="hpl" value="6">
                <label for="hpl">HPL fólia - 6 € m<sup>2</sup></label><br>
                <div class="option-val" id="hpl-input">
                    <label for="hpl-val">Počet m<sup>2</sup>:</label>
                    <input type="text" id="hpl-val">
                </div>
                <input type="radio" id="ral" value="20">
                <label for="ral">Pri striekaných bránach odtieň RAL - 20 € m<sup>2</sup></label><br>
                <div class="option-val" id="ral-input">
                    <label for="ral-val">Počet m<sup>2</sup>:</label>
                    <input type="text" id="ral-val">
                </div>
                <input type="radio" id="personal_doors" value="400">
                <label for="personal_doors">Personálne dvere - 400 €</label><br>
                <input type="radio" id="mount" value="200 €">
                <label for="mount">Montáž - do 200 €</label><br>
                <input type="radio" id="electric" value="150">
                <label for="electric">Elektrický pohon s dvoma diaľkovými - 150 €</label><br>
                <input type="submit" id="deselect" value="Odznačiť všetky">
                <input type="submit" id="get-total-price" value="Vypočítať celkovú cenu">
                <label for="total-price">Celková cena s doplnkami:</label>
                <input type="text" id="total-price" value="0 €" disabled>
            </div>
        </div>
        <div class="partners" id="partners">
            <h1>Partneri</h1>
            <div class="row">
                <div class="col-3">
                    <img src="assets/images/hrackarstvo-logo.png" alt="hrackarstvo-logo">
                    <a href="https://hrackarstvo.eu/">hrackarstvo.eu</a>
                </div>
                <div class="col-3">
                    <img src="assets/images/fp-interier-logo.png" alt="fp-interier-logo">
                    <a href="https://fpinterier.sk/">fpinterier.sk</a>
                </div>
                <div class="col-3">
                    <img src="assets/images/drevotriesky-logo.png" alt="drevotriesky-logo">
                    <a href="http://www.porezdrevotriesky.sk/uvod.html">porezdrevotriesky.sk</a>
                </div>
            </div>
        </div>
        <div class="contact" id="contact">
            <h1>Kontakt</h1>
            <form method="post" action="email.php" autocomplete="off" id="email-form">
                <label for="name">Meno</label>
                <input type="text" id="name" name="name" placeholder="Meno...">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail...">
                <label for="subject">Predmet správy</label>
                <input type="text" id="subject" name="subject" placeholder="Predmet správy...">
                <label for="text">Text správy</label>
                <textarea id="text" name="text" placeholder="Text správy..."></textarea>
                <input type="submit" id="submit" name="submit" value="Odoslať správu">
            </form>
            <h2 class="info"></h2>
            <p></p>
        </div>
    </section>
    <div class="footer">
        <div class="row">
            <div class="col-2">
                <p>&copy; Peter Miškovič - predaj garážových brán</p>
            </div>
            <div class="col-2">
                <p id="made">Made by Patrik Jakab</p>
            </div>
        </div>
    </div>

<?php include_once 'partials/footer.php'; ?>
