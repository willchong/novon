<?php
/**
 *
 * @package storefront
 */

?>

<section class="novon-wrap">

    <section class="intro">

        <h1>A jewellery company inspired by nature’s elements.</h1>
        <img src="<?php echo get_template_directory_uri(); ?>/novon/images/homepage-hero.jpg" alt="">
        
    </section>

    <section class="post-intro">
        <div class="description">
            <h4>The Novon Collection</h4>
            <a href="/shop/#design" class="cta inverse">Design your own</a>
        </div>
    </section>

    <section class="modular" id="modular">
        <div class="overlay">
            <img src="<?php echo get_template_directory_uri(); ?>/novon/images/modular-design-bg-2.jpg" alt="">
        </div>
        <div class="panel">
            <div class="steps">
                <h2>Modular Design</h2>
                <p id="earrings">Our modular design lets you create your own unique earrings, necklaces or bracelets to suit your style or mood.</p>
                <ol >
                    <li>Choose an earring or necklace top.</li>
                    <li>Add a stone, crystal or coin.</li>
                    <li>Add something else to create a totally new piece of jewelry.</li>
                </ol>
                <a href="/shop/#design" class="cta">Design your own</a>
            </div>
            <div class="earrings">
                <img id="earrings-top" class="top" src="<?php echo get_template_directory_uri(); ?>/novon/images/animation-top.png" alt="">
                <img id="earrings-bottom" class="bottom" src="<?php echo get_template_directory_uri(); ?>/novon/images/animation-bottom.png" alt="">
                <img id="earrings-change" class="change" src="<?php echo get_template_directory_uri(); ?>/novon/images/animation-change.png" alt="">
            </div>
        </div>
    </section>

    <section class="c-link" id="c-link">
        <div class="grey">
            <h2>C-Link</h2>
            <p>Bring it all together with our C-Link. Mix and match coins, crystals and stone charms for a stunning look in any situation.</p>
        </div>
        <div class="image">
            <img src="<?php echo get_template_directory_uri(); ?>/novon/images/c-link.jpg" alt="">
        </div>
    </section>

    <section class="stones">
        <div class="inset">
            <h2>Stones and Crystals</h2>
            <p>Find your balance with natural stones and crystals including Amethyst, Black Onyx, Rose Quartz, Lapis Lazuli and Swarovski Rose Pearl.</p>
            <a href="/shop/#design" class="cta">Design your own</a>
            <div class="swiper-container carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a class="no-visual" href="<?php echo get_site_url(); ?>/product/amethyst-c-link-sphere-drop/">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/stones-amethyst.jpg" alt="">
                            </div>
                            <div class="description">
                                <h3>Amethyst</h3>
                                <p>This beautiful violet stone is known for its ability to heal physical ailments and promote tranquility.</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="no-visual" href="<?php echo get_site_url(); ?>/product/onyx-c-link-sphere-drop/">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/stones-black-onyx.jpg" alt="">
                            </div>
                            <div class="description">
                                <h3>Black Onyx</h3>
                                <p>This dark stone has powerful, protective properties and helps maintain your personal energy.</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="no-visual" href="<?php echo get_site_url(); ?>/product/rose-quartz-c-link-sphere-drop/">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/stones-rose-quartz.jpg" alt="">
                            </div>
                            <div class="description">
                                    <h3>Rose Quartz</h3>
                                    <p>Representing universal love, this pink stone helps promote harmony in relationships.</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="no-visual" href="<?php echo get_site_url(); ?>/product/lapis-lazuli-c-link-oval-drop/">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/stones-lapis-lazuli.jpg" alt="">
                            </div>
                            <div class="description">
                                    <h3>Lapis Lazuli</h3>
                                    <p>This striking stone is known to release stress, and is often worn as a form of protection.</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a class="no-visual" href="<?php echo get_site_url(); ?>/product/swarovski-crystal-pink-c-link-sphere-drop/">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/stones-rose-pearl.jpg" alt="">
                            </div>
                            <div class="description">
                                    <h3>Swarovski Rose Pearl</h3>
                                    <p>This pink crystal can raise your self-esteem, restore confidence and balance emotions.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
           <!--  <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
        </div>
    </section>

    <section class="silver">
        <div class="inset">
            <div class="image">
                <img src="<?php echo get_template_directory_uri(); ?>/novon/images/silver.jpg" alt="">
            </div>
            <div class="description">
                <div class="wrapper">
                    <h2>Silver</h2>
                    <p>Enjoy our selection of .925 sterling silver, all rhodium plated to prevent tarnishing and to provide a long-lasting shine.</p>
                </div>
            </div>
        </div>
    </section>

   <!--  <section class="bio">
        <h3>The NOVON Collection</h3>
        <p>Novon is a jewellery company inspired by nature’s elements. Our passion is to make you look and feel exceptional.</p>
    </section> -->

    <section class="shop">
        <h1>Shop the collection</h1>
        <a href="/shop/" class="cta inverse bigger transparent">See Products</a>
    </section>

    <section class="modal js-modal">
        <div class="content">
            <h1>Come see the Novon Collection pop-up</h1>
            <p>at the Concept 0.5 store in the Yorkdale Mall (Toronto, ON) until March 31st.<br>Use coupon code "<strong>YORKDALE</strong>" for 25% off your purchase!</p>
            <a class="cta" target="_blank" href="http://yorkdale.com/stores/concept/">Find out more</a>
        </div>
    </section>

</section>