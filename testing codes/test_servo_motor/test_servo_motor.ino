#include <Servo.h>
Servo servo1;
int servoPin = 5;

void setup() {
  servo1.attach (servoPin);

}

void loop () {
  servo1.writeMicroseconds(1000);
  delay(1000);
  //servo1.writeMicroseconds(1500);
  //delay(1000);
  servo1.writeMicroseconds(2000);
  delay(1000);
}
