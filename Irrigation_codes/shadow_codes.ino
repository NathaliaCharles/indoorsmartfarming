#include <Servo.h>
Servo myservo;
float temp;
int tempPin = A1;
void setup() 
{ 
  Serial.begin (9600);
  myservo.attach (5, 600,2300);
  Serial.begin (9600);

}

void loop () 
{
  temp = analogRead(tempPin);
  //read analog volt from sensor and save to variable temp
  temp = temp * 0.48828125
  // convert the analog volt to its temperature equivalent
  Serial.print (" TEMPERATURE = ");
  Serial.print(temp); //display temperature value
  Serial.print(" +C");
  Serial.printIn();
if (temp >= 37) {
  //delay(1000);   //update sensor reading each one second
  //digitalWrite (2,HIGH);

  myservo.write(90); //if temp is more than 30* then the servo motor will turn on
  delay(1000);
  myservo.write(0);
}  
else 
 {
  //digitalWrite(2, LOW);
  myservo.write(0);
  delay(1000);
  myservo.write(90);
 }

}

