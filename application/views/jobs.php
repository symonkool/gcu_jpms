<script>
	document.title = 'Jobs - Job Portal';
	$('body').removeClass('body-bg');
	$('body').addClass('body-bc');
	$('header').removeClass('shadow');
</script>

<style>
	.back-to-top {cursor: pointer;position: fixed;bottom: 0;right: 20px;display:none;width: 40px;height: 40px;}
	.all-jobs{padding-top:70px;}
	.container{width: 100%;line-height: 1.5;}
	.filters{background:#FFF;margin: 10px 0;padding:10px 25px;float:right;}
	.results{background:#FFF;margin: 10px 0;float:right;padding:4vh 3vw;}
	.filter-title{text-align: left;padding:15px 0 1px 0;font-size: 100%;color: #6e6e6e;border-bottom: 1px solid #dadada;}
	.chevron{float: right;margin-top: 3px;font-size: 13px;font-weight: lighter;}
	label{margin: 0 5px;}
	.single-item{font-size: 100%;color: #6b6b6b;margin: 3px 0;}
	.item-group{max-height: 160px;overflow-y: auto;}
	.sliderange{border:0;color: #5c5c5c;font-size: 88%;font-weight: lighter;padding: 10px 0;}
	.single-fliter {margin: 5px 0;}
	.single-res{}
	.p0 {padding:0}
	.job-icon{margin: 8px 0;width: 50px;height: 50px;background: #039ac7;color: #fff;font-size: 180%;text-align: center;padding: 2px 3px;text-shadow: 1px 1px 1px #737373;}
	.job-title{font-size: 120%;color: #5182ba;}	
	.job-company{color: #8c8a8a;font-size: 90%;}
	.job-location{color: #8c8a8a;font-size: 93%;line-height: 1.5;padding:0;display: inline-block;}
	.job-description {color: #616161;}
	.job-salary{color: #8c8a8a;font-size: 93%;line-height: 1.5;display: inline-block;}
	.job-duration{color: #8c8a8a;font-size: 93%;line-height: 1.5;display: inline-block;}
	.job-expires{color: #8c8a8a;font-size: 93%;padding:0;line-height: 1.5;display: inline-block;}
	.job-created_by{color: #5182a7;font-size: 93%;padding:0;line-height: 1.5;}
	.fa1{font-size: 80%;margin: 0 7px 0 0;color:#86898c;}
	.single-job{padding-top: 70px;}
	.pre-wrap{white-space: pre-wrap;margin-left:18px;}
	.job-section{background: #fff;margin-right: auto;margin-left: auto;padding: 7vh;}
	.bullets{list-style-type: disc;}
	.divider1{width: 100%;border-bottom: 1px solid #dedede;margin: 14px 0px;}
	#slider-range{margin: 0 45px 0 10px;}
	#search{
		font-style:italic;
	}
	#search:not(:placeholder-shown) {
		font-style:normal;
	}
</style>

<section class='all-jobs'>
	<div class="container">
		<div class="row" style="display:flex;justify-content:center">
			<div class="input-group col-lg-5 col-md-7 col-sm-12 col-xs-12">
				<input type="search" class="form-control" name="search" id="search" value="<?= isset($search) ? $search : '' ?>" placeholder="Search Company, Jobs, or any">
				<div class="input-group-addon">
					<a href="javascript:void(0)" class="text-decoration-none text-secondary" id="search-result"><i class="fa fa-search"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
					<div class="filters col-xs-12 col-sm-12 col-md-10 col-lg-11">
						<?php //print_r($location); ?>
					<form>
						<div class='filter-title'>Filter Results</div>

						<div class='single-fliter'>
							<div class='filter-title'>Location<i  id='clear_location' style='float: right;margin: 1px 2px;font-size: 80%;text-decoration: underline;cursor:pointer;'>Clear</i></div>
							<div class='item-group'>
								
								
								<?php 
								///foreach($location as $key=>$val)
								foreach($location as $key)
								{ 
									$val=$key['location'];
									?>
								<div class='single-item'>
									<input type='checkbox' name='city[]' class='location_check' id='city-<?=$key?>' value='<?=$val?>' <?php if(isset($_GET['city']) && in_array($val,$_GET['city'])){ ?> checked <?php } ?>>
									<label for='city-<?=$key['id']?>'><?=$val?></label>
								</div>

								<?php }
								?>							 
							</div>		
						</div>		
						<div class='single-fliter'>
							<div class='filter-title'>Salary (per annum)<i class='chevron glyphicon glyphicon-chevron-down'></i></div>
							<div class='item-group'>
								<div class='single-item'>			
									<div class='sliderange'></div>
									<input type="hidden" name='salary_min' id="salary_min" value='<?= $salary_min ?>' readonly>
									<input type="hidden" name='salary_max' id="salary_max" value='<?= $salary_max ?>' readonly>
									
									<div id="slider-range"></div>							 
								</div>
							</div>					
					</div>
					</form>
					</div>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-7 col-lg-8">
					<div class="results col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
				</div>
				<div class="col-xs-12 col-sm-0 col-md-1 col-lg-1"></div>
			</div>
		</div>
	</div>
	</div>
</section>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
  <span class="glyphicon glyphicon-chevron-up"></span>
</a>
 <script>
	var ajax_call = '';
	var search = '<?= isset($search) ? $search : '' ?>';
	/*display job results*/
	function get_result() 
	{
		var str = $( "form" ).serialize();
		// ajax_call = $.ajax({});
		// ajax_call.abort();
		var url = base_url+'jobs?'+str+(search != '' ? '&search='+search : "");
		history.pushState(str,'Find jobs',url);
		ajax_call = $.ajax({
			url: base_url+'jobs/filter_result',
			method: 'post',
			dataType: 'json',
			data:{str:str,ajax:'true',search:search},
			success:function(res){
				if(res.length==0)
				{
					$('.results').html('No match found');	
				}		
				else
				{
		//			alert(res.length);
					$('.results').html('');
					if(res.length==1)
					{
						$('.results').append('<div class="row">1 result found</div>');
					}
					else
					{
						$('.results').append('<div class="row">'+res.length+' results found</div>');
					}
					for(var i=0;i<res.length;i++)
					{
						if(res[i].description.length>190)
						{
							res[i].description = res[i].description.slice(0,190)+"..";							
						}
						$('.results').append(							
							"<div class='row single-res'>"+
							"	<div class='p0 col-sm-12 col-md-12'>"+
							"		<div class='p0 col-sm-2 col-lg-1'>"+
							"			<div class='job-icon'>"+res[i].title[0]+"</div></div>"+
							"		<div class='col-sm-10 col-lg-11'>"+
							"			<div>"+
							"				<div class='job-title '><a href='"+base_url+"jobs/view/"+res[i].job_id+"' style='text-decoration:none;'>"+res[i].title+"</a></div>"+
							"				<div class='job-company'><i class='fa1 fa fa-building'></i>"+res[i].company+"</div>"+
							"				<div class='job-description'>"+res[i].description+"</div>"+
							"				<div class='p0 col-sm-12 col-md-12'>"+
							"					<div class='p0 job-location col-xs-12 col-sm-6 col-md-3 col-lg-2'><i class='fa1 fa fa-map-marker fa-2'></i>&nbsp;"+res[i].location+"</div>"+
							"					<div class='p0 job-salary col-xs-12 col-sm-6 col-md-4 col-lg-3'> <i class='fa1 fa fa-money'></i> ugx "+res[i].salary_min+" - "+res[i].salary_max+"</div>"+
							"					<div class='p0 job-expires col-xs-12 col-sm-6 col-md-3 col-lg-2'><i class='fa1 fa fa-clock-o'></i>"+res[i].duration+"</div>"+
							"					<div class='p0 job-duration col-xs-12 col-sm-6 col-md-4 col-lg-2'><i class='fa1 fa fa-hourglass-half '></i>"+res[i].expires+"</div>"+
							"				</div>"+
							"			</div>"+
							"		</div>"+
							"		</div>"+
							"</div>"
							);
						$('.results').append("<div class='divider1'></div>");
					}	
				}	
			},
		});	
	}
	
	$(document).ready(function(){
		$('#search').on('input change', function(){
			search = $(this).val()
			get_result()
		})
		$('#search').keypress(function(e){
			if(e.which == 13){
				e.preventDefault()
				search = $(this).val()
				get_result()
			}
		})
		get_result();
		/*salary slider*/
		$(function() {
			$( "#slider-range" ).slider({
				range: true,
				min: <?=$salary_min?>,
				max: <?=$salary_max?>,
				values: [ <?php if(isset($_GET['salary_min'])){ echo $salary_min=$_GET['salary_min']; }else{echo $salary_min;} ?>, <?php if(isset($_GET['salary_max'])){ echo $salary_max=$_GET['salary_max']; }else{echo $salary_max;} ?> ],
				slide: function( event, ui ) {
				$( "#salary_min" ).val(ui.values[ 0 ]);
				$( "#salary_max" ).val(ui.values[ 1 ]);
				$(".sliderange").html("<i class='fa fa-money'></i> "+ui.values[ 0 ]+" - <i class='fa fa-money'></i> "+ui.values[ 1 ]);
				get_result();
				}
			});
			$( "#salary_min" ).val($( "#slider-range" ).slider( "values", 0 ));
			$( "#salary_max" ).val($( "#slider-range" ).slider( "values", 1 ) );
			$(".sliderange").html("<i class='fa fa-money'></i> ugx "+$( "#slider-range" ).slider( "values", 0 )+" - ugx "+$( "#slider-range" ).slider( "values", 1 ));
		});

  $( "input[type='checkbox'], input[type='radio']" ).on( "click", get_result );
  $( "select" ).on( "change", get_result );
  
	$('#clear_location').click(function(){
		$('.location_check').removeAttr('checked');
		get_result();
	});
	
      	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) { $('#back-to-top').fadeIn();} 
			else { $('#back-to-top').fadeOut();}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('#back-to-top').tooltip('hide');
			$('body,html').animate({scrollTop: 0}, 1000);
			return false;
		}); 
	});
</script>