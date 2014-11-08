$(function()
{
	function openRoads(){
		$('#menuExplorer').on(
            'change', function(){
                var curentMenu = $('#menuExplorer').val();
                if('frag' !== curentMenu){
                    window.location = 'explore-'+curentMenu;
                    return;
                }
                else{
                    window.location = 'fragments';
                    return;
                }
		});
		$('#menuProjet').on(
            'change', function(){
                window.location = $(this).val();
		});
		$('#menuStock').on(
            'change', function(){
                window.location = $(this).val();
		});
	}
	openRoads();
});