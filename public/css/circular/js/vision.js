$(document).ready(function(){
			var $pcvision = $('#progressControllervision');
			var $pCaptionvision = $('.progress-bar-vision p');
			var iProgressvision = document.getElementById('inactiveProgress-vision');
			var aProgressvision = document.getElementById('activeProgress-vision');
			var iProgressCTXvision = iProgressvision.getContext('2d');

			
			drawInactivevision(iProgressCTXvision);
			
			$pcvision.on('change', function(){
				var percentagevision = $(this).val() / 100;
				console.log(percentagevision + '%');
				drawProgressvision(aProgressvision, percentagevision, $pCaptionvision);
			});

			function drawInactivevision(iProgressCTXvision){
				iProgressCTXvision.lineCap = 'square';

				//outer ring
				iProgressCTXvision.beginPath();
				iProgressCTXvision.lineWidth = 15;
				iProgressCTXvision.strokeStyle = '#e1e1e1';
				iProgressCTXvision.arc(137.5,137.5,129,0,2*Math.PI);
				iProgressCTXvision.stroke();

				//progress bar
				iProgressCTXvision.beginPath();
				iProgressCTXvision.lineWidth = 0;
				iProgressCTXvision.fillStyle = '#e6e6e6';
				iProgressCTXvision.arc(137.5,137.5,121,0,2*Math.PI);
				iProgressCTXvision.fill();

				//progressbar caption
				iProgressCTXvision.beginPath();
				iProgressCTXvision.lineWidth = 0;
				iProgressCTXvision.fillStyle = '#fff';
				iProgressCTXvision.arc(137.5,137.5,100,0,2*Math.PI);
				iProgressCTXvision.fill();

			}
			function drawProgressvision(bar, percentagevision, $pCaptionvision){
				var barCTXvision = bar.getContext("2d");
				var quarterTurnvision = Math.PI / 2;
				var endingAnglevision = ((40*2*percentagevision) * Math.PI) - quarterTurnvision;
				var startingAnglevision = 0 - quarterTurnvision;

				bar.width = bar.width;
				barCTXvision.lineCap = 'square';

				var color = '#0079d7'
				if($pcvision.val() == 0)
				{
					var word = 'smell';
				}
				else if($pcvision.val() > 0 && $pcvision.val() <=1)
				{
					var word = 'ไม่มีกลิ่น';
					color = '#00b03c';
				}
				else if($pcvision.val() > 1 && $pcvision.val() <=2)
				{
					var word = 'มีกลิ่น';
					color = '#ffd800';
				}
				else
				{
					var word = 'มีกลิ่นมาก';
					color = '#ff0031';
				}

				barCTXvision.beginPath();
				barCTXvision.lineWidth = 20;
				barCTXvision.strokeStyle = color;
				barCTXvision.arc(137.5,137.5,111,startingAnglevision, endingAnglevision);
				barCTXvision.stroke();

				$pCaptionvision.text(word);
			}

				var percentagevision = $pcvision.val() / 100;
				drawProgressvision(aProgressvision, percentagevision, $pCaptionvision);

			
		});