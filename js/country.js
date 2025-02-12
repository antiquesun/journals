var countryArr = new Array('United States','Canada');
var countryValArr = new Array('United States','Canada');

                           
var statesArr = new Array('- Select -','AK','AL','AR','AZ','CA','CO','CT','DC','DE','FL','GA','HI','IA',
                          'ID','IL','IN','KS','KY','LA','MA','MD','ME','MI','MN','MO','MS',
                          'MT','NC','ND','NE','NH','NJ','NM','NV','NY','OH','OK','OR','PA',
                          'RI','SC','SD','TN','TX','UT','VA','VT','WA','WI','WV','WY',
                          'Puerto Rico','Virgin Island','Northern Mariana Islands','Guam','American Samoa','Palau');

                                              

var canadianProvincesArr = new Array('- Select -','Alberta','British Columbia','Manitoba','New Brunswick','Newfoundland and Labrador',
                   'Northwest Territories','Nova Scotia','Nunavut','Ontario','Prince Edward Island',
                   'Quebec','Saskatchewan','Yukon Territory');


var countryToArr = new Array();

countryToArr['United States'] = statesArr;
countryToArr['Canada'] = canadianProvincesArr;


function init(formName,formArray,valArray) {
  var l=0;
  var k=0;
  val  = valArray[0];
  val2 = valArray[1];

  for(i = 0;i<countryArr.length;i++) {
    var no = new Option();
    no.value=countryValArr[i];
    no.text=countryArr[i];
    eval("document." + formName + "." + formArray[0] + ".options[k]=no");
    if(val == countryValArr[i]) 
       eval("document." + formName + "." + formArray[0] + ".options[k].selected=true");
    k++;
  }
  countryVal = (valArray[0] != "") ? valArray[0] : "United States";
  populateStates(countryVal,formName,formArray[1],val2);
 
}

function changeStates(country,formName,formElement,val) {
   populateStates(country,formName,formElement,val);
}

function populateStates(country,formName,formElement,val) {
  var l = 0;

  eval("document." + formName + "." + formElement + ".length=0");
  var stateArray = countryToArr[country];
  for(i = 0;i<stateArray.length;i++) {
    var no = new Option();
    no.value=stateArray[i];
    no.text=stateArray[i];
    eval("document." + formName + "." + formElement + ".options[l]=no");
    if(val == stateArray[i]) 
      eval("document." + formName + "." + formElement + ".options[l].selected=true");
    l++;
  }
}

 