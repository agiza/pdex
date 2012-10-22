
<div class="row-fluid">

  <div class="span12">
  	<div class="tops">
  		<img src="/img/logo_a.png" />
    </div>
    <div class="row-fluid">

      <div class="span6">
      	<div id="racers">
      		<?php foreach ($terms as $term) { ?>
      		
      			<div id="cti_<?php echo $term['ct_id']; ?>" class="racer">
      			 
      			<div class="circle avatar <?php echo $term['ct_color']; ?>"><span><?php echo $term['ct_score']; ?></span>
      			<img src="/chart_img/cti_<?php echo $term['ct_id']; ?>.png" class="img-circle pic" />
      			</div>
      			<div class="bar <?php echo $term['ct_color']; ?>">
      			<div class="triangle-right"></div>
      			<span class="compareTerm"><?php echo strtoupper($term['ct_name']); ?></span>
      			</div>
      			<div class="stats">
      			<?php echo $term['ct_cnt_pos']; ?> Positive<br/>
      			<?php echo $term['ct_cnt_ntl']; ?> Neutral<br/>
      			<?php echo $term['ct_cnt_neg']; ?> Negative<br/>
      			</div>
      			</div>
      			
      		<?php } ?>

   	    </div>

      </div>
      <div class="span6 tweetBox tweetContainer">
      
	
   		<ul id="tw">
   		<?php foreach ($tweets as $tw) { ?>
			<li class="<?php echo $tw['t_sentiment']; ?>">
    			<?php echo $tw['t_sentiment']; ?><br /> 
			 	<span class="date"><?php echo $tw['t_date']; ?></span><br />
    		 	<span class="user"><?php echo '@'.$tw['t_user']; ?></span><br />
    		 	<span class="username"><?php echo $tw['t_user_name']; ?></span>
				<img src="<?php echo $tw['t_profile_img_url']; ?>" class="tweetImage" />
				<div class="tweet"><?php echo '@'.$tw['t_text']; ?></div>
    		</li>
		<?php } ?>
    	</ul>
		
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">

    var myScroll,
    	highScore = <?php echo $terms[0]['ct_score']; ?>,
    	delay = 2000, // you can change it
    	i = 0,
        racers = <?php echo $jsonTerms; ?>;

    function autoScroll() {
        var itemHeight = $('#tw li').outerHeight();
        /* calculte how much to move the scroller */
        var moveFactor = parseInt($('#tw').css('top')) + itemHeight;
        /* animate the carousel */
        $('#tw').animate({
            'top' : moveFactor
        }, 'slow', 'linear', function(){
            /* put the last item before the first item */
            $("#tw li:first").before($("#tw li:last"));
            /* reset top position */             
            $('#tw').css({'top' : '-6em'});
        });
    };

	function animateTerms() {
		var r = racers,
			h = highScore,
			rDiv,multiplier,faceMargin,barWidth,score;
	
        for (var i = 0; i < r.length; i++) {
    		rDiv 	  = 'div#cti_' + r[i].ct_id;
    		score	  = parseInt(r[i].ct_score,10);
    		multiplier = 60 / h;	
    		faceMargin = score * multiplier;
    		barWidth   = faceMargin + 10;
        
        	$(rDiv).find('.avatar').animate({    
        	    'margin-left': faceMargin + '%'
        	  }, 2000, function() {
        	    // Animation complete.
        	  });
        	$(rDiv).find('.bar').animate({    
        	    'width': barWidth + '%'
        	  }, 2000, function() {
        	    // Animation complete.
        	  });  
        	$(rDiv).find('.avatar').click(function() {
      	      if ($(rDiv).find('.stats').is(":hidden")) {
      	    		$(rDiv).find('.stats').slideDown("slow");
      	        } else {
      	        	$(rDiv).find('.stats').slideUp("slow");
      	        }
      		});
        }
	}

    $(document).ready(function() {
    	// setTimeout('shift()', delay);
    	setTimeout('animateTerms()', delay);
        /* make the carousel scroll automatically when the page loads */
        var moveScroll = setInterval(autoScroll, 6000);
    });

</script>
