<!---PREMIER EXEMPLE JAVASCRIPT-->
<!--<span id="ZoneDeClic"></span>
<div id="TexteAAfficher" style="text-align:center;font-size:large">Solution</div>-->


<!--DEUXIEME EXEMPLE JAVASCRIPT>
<div class="zoneTexteAfficherMasquer">
    <span class="inviteClic">Question 1</span>
    <div class="TexteAAfficher" style="text-align:center;font-size: large">Le modal réseau c'est vraiment fabuleux</div>
</div>

<div class="zoneTexteAfficherMasquer">
    <span class="inviteClic">Question 2</span>
    <div class="TexteAAfficher" style="text-align:center;font-size: large">Les autres modal sont moins drôles</div>
</div>

<div class="zoneTexteAfficherMasquer">
    <span class="inviteClic">Question 3</span>
    <div class="TexteAAfficher" style="text-align:center;font-size: large">Les autres modal sont moins drôles</div>
</div-->

<div id="gallery1" style="display:none;">
    <img alt="welcome01"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTWXpoQ3hfZGdoZWM"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTWXpoQ3hfZGdoZWM"
         data-description="This is welcome01"
         >

    <img alt="welcome02"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTLVE4WUNsQlJiMlU"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTLVE4WUNsQlJiMlU"
         data-description="This is welcome02"
         >

    <img alt="welcome03"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTVmE0SDZ0dVJocVU"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTVmE0SDZ0dVJocVU"
         data-description="This is welcome03"
         >

    <img alt="welcome04"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTSzY1SHV3anFyQWc"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTSzY1SHV3anFyQWc"
         data-description="This is welcome04"
         >

    <img alt="welcome05"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTTnpoa09ydUhuTkE"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTTnpoa09ydUhuTkE"
         data-description="This is welcome05"
         >

    <img alt="welcome06"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTLWtlYnU4Z1FIb00"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTLWtlYnU4Z1FIb00"
         data-description="This is welcome06"
         >

    <img alt="welcome07"
         src="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTanQ5QlU3a1FrSWs"
         data-image="https://drive.google.com/uc?export=view&id=0B2ykXhK03XtTanQ5QlU3a1FrSWs"
         data-description="This is welcome07"
         >


</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#gallery1").unitegallery({
            gallery_theme: "slider",
            gallery_autoplay:false,
            gallery_width:9000,		//gallery width		
            gallery_height:5000		//gallery height
        });
    });
</script>