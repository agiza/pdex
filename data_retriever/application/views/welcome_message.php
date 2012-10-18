
<div class="row-fluid">

  <div class="span12">
  	<div class="tops">
  		<img src="/img/logo_a.png" />
    	<h2>The Race</h2>
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
      <div class="span6 tweetBox">
      	<h2>Recent Conversation</h2>
  		<div id="feeds">
            <div class="item" id="feed0" style="display: none;">YOURCONTENTS</div>
            <div class="item" id="feed1" style="display: none;">YOURCONTENTS</div>
            <div class="item" id="feed2" style="display: none;">YOURCONTENTS</div>
		</div>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">

    var highScore = 24,
    	delay = 2000, // you can change it
    	count = 5, // How much items to animate
    	showing = 3, //How much items to show at a time
    	i = 0,
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
        			
        	];

	function animateTerms() {
		var r = racers,
			h = highScore,
			rDiv,multiplier,faceMargin,barWidth,score;
	
        for (var i = 0; i < r.length; i++) {
    		rDiv 	  = 'div#' + r[i].name;
    		score	  = parseInt(r[i].score,10);
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

    function move(i) {
        return function() {
          $('#feed'+i).remove().css('display', 'none').prependTo('#feeds');
        }
      }

    function shift() {
        var toShow = (i + showing) % count;
        $('#feed'+toShow).slideDown(1000, move(i));
        $('#feed'+i).slideUp(1000, move(i));
        i = (i + 1) % count;
        setTimeout('shift()', delay);
    }  	

    $(document).ready(function() {
    	setTimeout('shift()', delay);
    	setTimeout('animateTerms()', delay);
    });

</script>
