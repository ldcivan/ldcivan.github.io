function livelyPropertyListener(name, val)
{
  switch(name) {
    case 'count':
        count = val;
        break;
    case "backgroundColor":
        var color = hexToRgb(val);
        backgroundColor = `rgb(${color.r},${color.g},${color.b})`;
        break;   
    case "showOrbit":
        show_orbit = val;
        break;     
    case "orbitLength":
        max_orbit_len = val ; 
        break;
    case "standard":
        if(val){
        mode="standard";
        } else {
            mode="";
        }
        break;
  }
  start();
}