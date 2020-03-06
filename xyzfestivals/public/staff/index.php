 <?php require_once('../../private/initialize.php'); ?>

 <?php include(SHARED_PATH . '/staff_header.php'); ?>

<section id="history" class="section">
	<div class="container">
		<div class="text-content">
		  <h2 class="headline">Festival History</h2>
		  <p>Born in 2013, XyZ-Festivals is a series of festivals organised in many cities of Romania. It is a pure Romanian festival because only Romanian artists come on its stage.</p>  
		  <p>It welcomes every year hundreds of thousands of visitors from all around Europe, America, and Asia. In 2018 the Festival has counted more than 250000 visitors.</p>
		  <p>XyZ-Festivals is unique in its genre: from the huge mainstage in the arena to the more intimate stage for the club lovers, XyZ is able to satisfy even the finest palates.</p> 
		  <p>Last year the festival has seen more than 100 artists across 10 stages in 10 cties. Among the artists were bands that did not miss any festival include: Smiley, Holograph, Iris and other.</p>    
		</div>
	</div><!-- container text -->
</section><!-- #history -->

<section id="tickets" class="section">
  <header class="imageheader"></header>
  <div class="container">
		<br><h2 class="headline">tickets</h2>
		<p>XyZ festivals wants to give to spectators the best view of the stage where the artists arrive.Take a look at some of our <em>tickets</em>. We <a href="#guarantee">guarantee</a> the return of money up to a certain period.</p>
		<div class="text-content">
			<p>Press here to <a href="<?php  echo url_for('/staff/acquisition/new.php')   ?>" title="buy">buy</a> or to <a href="<?php  echo url_for('/staff/acquisition/edit.php')?>" title="update">update</a> a ticket</p><br>
		</div>
		<?php
			$types = find_all_types();
			$prices = find_all_prices();
		?>
  </div><!-- container -->
  <ul class="ticket-list">
    <li class="ticket-item">
      <img class="ticket-image" src="../images/tickets/class1.jpg" alt="CLASS1 - ticket Photo">
      <h2 class="ticket-name"><?php echo $types[0] . " - ". $prices[0]." ron"?></h2>
    </li>
    <li class="ticket-item">
      <img class="ticket-image" src="../images/tickets/class2.jpg" alt="CLASS2 - ticket Photo">
      <h2 class="ticket-name"><?php echo $types[1] . " - ". $prices[1]." ron"?></h2>
    </li>
	 <li class="ticket-item">
      <img class="ticket-image" src="../images/tickets/class3.jpg" alt="CLASS3 - ticket Photo">
      <h2 class="ticket-name"><?php echo $types[2] . " - ". $prices[2]." ron"?></h2>
    </li>
    <li class="ticket-item">
      <img class="ticket-image" src="../images/tickets/vip.jpg" alt="VIP - ticket Photo">
      <h2 class="ticket-name"><?php echo $types[3] . " - ". $prices[3]." ron"?></h2>
    </li>
  </ul><!-- ticket-list -->
</section><!-- #tickets -->

<section id="guarantee" class="section">
  <div class="container">
	  <div class="text-content">
		<h2 class="headline">Our Guarantee &amp; Ideals</h2>
		<div class="text-content">
		<p>We’re committed to creating tickets that <em>defy convention</em>, and inspire our customers with pride and trust. In fact, we guarantee <a href="#tickets">every ticket</a> we sell. If you’re not 100 percent happy with your purchase, you can return it during the first 60 days, <em>no questions asked</em>.</p>
		<p>Press here to <a href="<?php  echo url_for('/staff/acquisition/cancel.php')   ?>" title="delete">cancel </a> a resevation.
	 </div>
	 </div>
  </div>
</section><!-- guarantee -->

<section id="artists" class="section">
	<header class="imageheader"></header>
	<div class="container">
		<h2 class="headline">artists</h2>
		<div class="artists-cards">
		
		  <div class="artists-card">
			<img src="../images/artists/Holograf.jpg" alt="Holograf">
			<div class="card-info">
			  <h3 class="card-name">Holograf</h3>
			  <h4 class="card-title">Band</h4>
			</div>
			<p class="card-text">Holograf is a modern rock band from Romania. Since the band's formation in 1978, Holograf released 18 albums. The band won the Excellence Prize at Romanian Media Music Awards in 2013, the awards for best pop-rock artist and best pop-rock song at Radio Romania Music Awards Gala in 2014 and was nominated multiple times at Romanian Music Awards for Best Group and for Best Song. </p>
		  </div><!-- artists-card -->

		  <div class="artists-card">
			<img src="../images/artists/Trooper.jpg" alt="Trooper">
			<div class="card-info">
			  <h3 class="card-name">Trooper</h3>
			  <h4 class="card-title">Band</h4>
			</div>
			<p class="card-text">Trooper is a Romanian heavy metal music band. It was formed on 25 October 1995, by brothers Alin and Aurelian Dincă and Ionuţ Rădulescu being influenced by bands like Iron Maiden or Judas Priest The band used to be called Megarock, then White Wolf. Once with the arrival of Ionuţ "Negative" Fleancu the band was renamed to Trooper. Poll conducted by the specialized Heavy Metal Magazine in 2001 placed Trooper first in the category Best young band. Throughout their career, Trooper have shared their stage with bands such as Iron Maiden, Manowar, Sepultura, Kreator and Evergrey. </p>
		  </div><!-- artists-card -->

		  <div class="artists-card">
			<img src="../images/artists/VitaDeVie.jpg" alt="Vita de vie">
			<div class="card-info">
			  <h3 class="card-name">Vita de vie</h3>
			  <h4 class="card-title">Band</h4>
			</div>
			<p class="card-text">Vița de Vie is an alternative rock band (occasionally rap, hardcore, jazz, and reggae) from Romania, formed in 1996. Their first album, "Rahova", was released in 1997. The last album called 'Sase (+) 'was launched on October 29, 2016, at Roman Arenas, alongside Flesh Rodeo, Tourette Loulette, Gray Matters, The Kryptonite Sparks and Days of Confusion.</p>
		  </div><!-- artists-card -->

		  <div class="artists-card">
			<img src="../images/artists/Motans.jpg" alt="The Motans">
			<div class="card-info">
			  <h3 class="card-name">The Motans</h3>
			  <h4 class="card-title">Band</h4>
			</div>
			<p class="card-text">The Motans is a musical band from the Republic of Moldova. The band consists of vocal Denis Roabeş, Damian Rusu – Guitar, Ali Said – Drums, Matei Capitan – Bass. The band was founded in the city of Chisinau, The Motans combines several musical styles among which the most popular are pop. They recorded top hits in Romania such as Versus, August, Weekend, 1000 RPM, which ranked first in all music charts in Romania and Moldova.</p>
		  </div><!-- artists-card -->
			
			<div class="artists-card">
			<img src="../images/artists/SudEst.jpg" alt="3 Sud Est">
			<div class="card-info">
			  <h3 class="card-name">3 Sud Est</h3>
			  <h4 class="card-title">Band</h4>
			</div>
			<p class="card-text">3rd South East is a Romanian pop and dance band, formed in 1997. After a decade of activity, the band dissolved in 2008, officially meeting on February 28, 2014 with the release of a new single - "Emotii". 3 Sud Est was one of the most successful Romanian bands, its members being nicknamed "Dance Music Kings". In the first years since its foundation, the band has broken several records in terms of sales: 800,000 audio cassettes and CDs sold throughout the country. Disc 3 Sud Est, released in 1998, was sold in over 200,000 copies on audio tape, and in 6,000 copies on CD. Among the best known songs of the band are "Ai plecat", the song by which they defined their characteristic style, "De ziua ta", but also "Amintirile", the most successful song of the three.</p>
		  </div><!-- artists-card -->

		  <div class="artists-card">
			<img src="../images/artists/Inna.jpg" alt="Inna">
			<div class="card-info">
			  <h3 class="card-name">Inna</h3>
			  <h4 class="card-title">Solo artist</h4>
			</div>
			<p class="card-text">Elena Alexandra Apostoleanu (born 16 October 1986), known professionally as Inna, is a Romanian singer and songwriter.Romanian singer Inna has released six studio albums, three compilation albums, 50 singles (including 15 as featured artist) and 29 promotional singles. Her YouTube channel surpassed three billion total views as of May 2019. 19 of her singles have reached the top ten in Romania, with "Hot", "Amazing" and "Diggy Down" topping the country's singles chart in 2008, 2009 and 2015, respectively. With global album sales of four million copies from her first three studio albums, Inna is the best-selling Romanian artist</p>
		  </div><!-- artists-card -->
		  
		</div>   
	 
	   <div class="text-content">
		 <p>See all the artists and all the shows in <a href="<?php echo url_for('/staff/calendar/calendar.php') ?>" title="calendar">calendar</a></p> 
	   </div>
   
	</div><!-- container -->
</section><!-- artists -->


 <?php include(SHARED_PATH . '/staff_footer.php'); ?>

