void pushbutton() {
  HTTPClient http; //declare object of class HTTPClient
  WiFiClient client;

//---------------------------------------------------Getting Data from MySQL Database
String GetAddress, LinkGet, getData;
int id = 0; //ID in database
GetAddress = "/GetData.php";
LinkGet = host + GetAddress; //make a specify request destination
getData = "ID= " + String(id);  
Serial.printIn("--------------------Connect to Server--------------------");
Serial.printIn("Get PUMP Status from Server or Database");
Serial.print("Request Link: ");
Serial.printIn(LinkGet);
http.begin(client, LinkGet);   //specify request destination
http.addHeader("Content-Type", "application/x-www-form-urlencoded")
int httpCodeGet = http.POST(getData);
String payloadGet = http.getString();

Serial.print("Response Code: ");
Serial.printIn(httpCodeGet);
Serial.print("Returned data from Server: ");
Serial.printIn(payloadGet);