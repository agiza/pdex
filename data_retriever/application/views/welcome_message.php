
<div class="row-fluid">

  <div class="span12">
  	<div class="tops">
  		<img src="/img/logo_a.png" />
    	<h2>header</h2>
    </div>
    <div class="row-fluid">

      <div class="span6">
      	<div id="racers">
      	
      		<div id="cti_1" class="racer">
          	
              	<div class="circle avatar red"><span>12</span>
        	      	<img src="/chart_img/cti_1.png" class="img-circle pic" />
              	</div>
              	<div class="bar red">
              		<div class="triangle-right"></div>
              		<span class="compareTerm">ROMNEY</span>
              	</div>
              	<div class="stats">
              		fdisfdofndsoaifdsaf<br/>
              		fdsafdsafdasfda f ere<br/>
              		wfds fds dfsa fdsahere<br/>          		
              	</div>
           	</div>
           	
       		<div id="cti_2" class="racer">          	
              	<div class="circle avatar blue"><span>23</span>
        	      	<img src="/chart_img/cti_3.png" class="img-circle pic" />
        	    </div>
               	<div class="bar blue">
               	   	<div class="triangle-right"></div>
               	   	<span class="compareTerm">OBAMA</span>
               	</div>
               	<div class="stats">
              		we got some stats here<br/>
              		we got some stats here<br/>
              		we got some stats here<br/>          		
              	</div>
           	</div>

   	    </div>
      
      </div>
      <div class="span6 tweetBox">Level 2
      		<i class="icon-search"></i>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">

    $(document).ready(function() {
    
    // assume we can use 80% of the div we are in and set the leader to 100% of that 80%
    // divide the losers to their percentage of the winners score in the 80%
    var wait = 1000,
    	highScore = 24,
    	racers = [
    			{
    				name:	'cti_1',
    				score:	12,
    				pos:	5,
    				neg:	1,
    				ntl:	2
    			},
    			{
    				name:	'cti_2',
    				score:	24,
    				pos:	33,
    				neg:	4,
    				ntl:	5
    			}	
    				
    		],
    	rDiv,multiplier,faceMargin,barWidth,score;
	
    for (var i = 0; i < racers.length; i++) {
		rDiv 	  = 'div#' + racers[i].name;
		score	  = parseInt(racers[i].score,10);
		multiplier = 60 / highScore;	
		faceMargin = score * multiplier;
		barWidth   = faceMargin + 10;
    
    	$(rDiv).find('.avatar').animate({    
    	    'margin-left': faceMargin + '%'
    	  }, 2000, function() {
    	    // Animation complete.
    	  }).delay(wait);
    	$(rDiv).find('.bar').animate({    
    	    'width': barWidth + '%'
    	  }, 2000, function() {
    	    // Animation complete.
    	  }).delay(wait);  
    	$(rDiv).find('.avatar').click(function() {
  	      if ($(rDiv).find('.stats').is(":hidden")) {
  	    		$(rDiv).find('.stats').slideDown("slow");
  	        } else {
  	        	$(rDiv).find('.stats').slideUp("slow");
  	        }
  		});
    }

    });
</script>
