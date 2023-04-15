import 'package:deliveryapp/users/home/home.dart';
import 'package:otp_text_field/style.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:flutter/material.dart';
import 'dart:convert';
import 'dart:math';
import 'dart:ui';
import 'package:otp_text_field/otp_text_field.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:deliveryapp/style/typo.dart';
import 'package:deliveryapp/style/color.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/users/profile/profile.dart';
import 'package:deliveryapp/users/order/orders.dart';
import 'package:deliveryapp/users/maps/maps.dart';
import 'package:deliveryapp/users/qrscan/qrcode.dart';
import 'package:flutter/services.dart';
import 'package:flutter_barcode_scanner/flutter_barcode_scanner.dart';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:deliveryapp/api/api_connect.dart';
import 'package:deliveryapp/users/model/user.dart';
import 'package:url_launcher/url_launcher_string.dart';

class VerifyDelivery extends StatefulWidget {

  final String myVariable;
  final String myVariable2;
  VerifyDelivery({required this.myVariable, required this.myVariable2});

  @override
  _VerifyDeliveryState createState() => _VerifyDeliveryState();
}

class _VerifyDeliveryState extends State<VerifyDelivery> {

  OtpFieldController otpController = OtpFieldController();

  int currentIndex = 1;


  bool isLoading = false;



  setBottomBarIndex(index) {
    setState(() {
      currentIndex = index;
    });
  }


  // Future<void> getDashNow() async {
  //   setState(() {
  //     isLoading = true;
  //   });
  //
  //   try {
  //     final SharedPreferences prefs = await SharedPreferences.getInstance();
  //     var res = await http.post(
  //       Uri.parse(API.getpstatus),
  //       body: {
  //         'pay_id': widget.myVariable,
  //       },
  //     );
  //
  //     if (res.statusCode == 200) {
  //       var jsonMap = jsonDecode(res.body);
  //       // print(jsonMap);
  //       setState(() {
  //         jmap = jsonMap["userData"];
  //         amap = jsonMap["address"];
  //       });
  //
  //       if(amap[7]=='4'){
  //         _onStatusChange("Picked Up");
  //       }
  //       else if(amap[7]=='5'){
  //         _onStatusChange("In Transit");
  //       }
  //     } else {
  //       Fluttertoast.showToast(msg: 'Error..!');
  //     }
  //   } catch (e) {
  //     // log(e.toString());
  //   }
  //   finally{
  //     setState(() {
  //       isLoading = false;
  //     });
  //   }
  // }
  //
  //
  // Future<void> update(a) async {
  //
  //   try {
  //
  //
  //     var res = await http.post(
  //       Uri.parse(API.updatepstatus),
  //       body: {
  //         'sid': a.toString(),
  //         'pid' : jmap[0],
  //       },
  //     );
  //
  //
  //     if (res.statusCode == 200) {
  //       var respst = jsonDecode(res.body);
  //       if(respst['success']){
  //         Fluttertoast.showToast(msg: 'Status Successfully Updated..!');
  //       }
  //       print(respst['success']);
  //     } else {
  //       Fluttertoast.showToast(msg: 'Error..!');
  //     }
  //   } catch (e) {
  //     // log(e.toString());
  //   }
  //
  // }
  //



  String _currentStatus = "Picked Up";
  String _currentOtp = "hi";

  void _onStatusChange(String status) {
    setState(() {
      _currentStatus = status;
    });
  }

  Future<void> sendOTP() async {
    var rng = new Random();
    var otp = 10000 + rng.nextInt(90000);
    setState(() {
      _currentOtp = otp.toString();
    });

      try {
        final SharedPreferences prefs = await SharedPreferences.getInstance();


        var res = await http.post(
          Uri.parse(API.sendotp),
          body: {
            'otp': _currentOtp,
            'user_id': widget.myVariable2,
          },
        );
        print(res.statusCode);
        if (res.statusCode == 200) {

          var jsonMap = jsonDecode(res.body);
          Fluttertoast.showToast(msg: 'OTP Send Successfully..!');
        } else {
          Fluttertoast.showToast(msg: 'Error..!');
        }
      } catch (e) {
        // log(e.toString());
      }

  }

  Future<void> verifyOTP() async {
    // List<String> otpValueList = otpController.getEnteredCode();
    // String otpValue = otpValueList.join();
    if(_currentOtp==_currentStatus) {
      Fluttertoast.showToast(msg: "OTP Verified Successfully");
      var res = await http.post(
        Uri.parse(API.updatepstatus),
        body: {
          'sid': "6",
          'pid' : widget.myVariable,
        },
      );
      Navigator.pop(context);
    }
    else
    {
      Fluttertoast.showToast(msg: "Invalid OTP");
    }
  }


  @override
  void initState() {
    super.initState();
    //getDashNow();
  }


  @override
  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    //getDashNow();

    return Scaffold(
      appBar: AppBar(
        title: Text("Verify Delivery"),
        centerTitle: true,
        automaticallyImplyLeading: false,
        backgroundColor: Colors.deepPurple,
      ),
      backgroundColor: Colors.white,
      body:
      Stack(
        children: [

          Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [

                  SizedBox(
                    width: MediaQuery.of(context).size.width-20,
                    child:
                    OTPTextField(
                      controller: otpController,
                      length: 5,
                      width: MediaQuery.of(context).size.width,
                      fieldWidth: 60,
                      style: TextStyle(
                          fontSize: 20
                      ),
                      textFieldAlignment: MainAxisAlignment.spaceAround,
                      fieldStyle: FieldStyle.box,
                      onCompleted: (pin) {
                        _onStatusChange(pin.toString());
                        //print(widget.myVariable + pin);
                      },
                    ),
                  ),

                  SizedBox(height: 40.0),

                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [

                      SizedBox(width: 20),

                      Expanded(
                        child: GestureDetector(
                          onTap: () {
                              sendOTP();
                          },
                          child: Container(
                            decoration: BoxDecoration(
                              color: Colors.green,
                              borderRadius: BorderRadius.circular(8),
                            ),
                            padding: EdgeInsets.all(16),
                            child: Center(
                              child: Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: [
                                  Icon(
                                    Icons.message,
                                    color: Colors.white,
                                  ),
                                  SizedBox(width: 8),
                                  Text(
                                    "Send OTP",
                                    style: TextStyle(
                                      color: Colors.white,
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ),
                      ),

                      SizedBox(width: 16),

                      Expanded(
                        child: GestureDetector(
                          onTap: () {
                              verifyOTP();
                          },
                          child: Container(
                            decoration: BoxDecoration(
                              color: blue,
                              borderRadius: BorderRadius.circular(8),
                            ),
                            padding: EdgeInsets.all(16),
                            child: Center(
                              child: Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: [
                                  Icon(
                                    Icons.verified,
                                    color: Colors.white,
                                  ),
                                  SizedBox(width: 8),
                                  Text(
                                    "Verify OTP",
                                    style: TextStyle(
                                      color: Colors.white,
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ),
                      ),

                      SizedBox(width: 20),

                    ],
                  ),
                  SizedBox(height: 40.0),

                ],
              )
          ),


          Positioned(
            bottom: 0,
            left: 0,
            child: Container(
              width: size.width,
              height: 80,
              child: Stack(

                children: [
                  CustomPaint(
                    size: Size(size.width, 80),
                    painter: BNBCustomPainter(),
                  ),
                  Center(
                    heightFactor: 0.6,
                    child: FloatingActionButton(backgroundColor: Colors.deepPurple, child: Icon(Icons.qr_code,color: Colors.white,), elevation: 0.1,
                        onPressed: () {
                          //for Scanning Qr Code
                          // scanQRCode();
                          Get.to(() => QRScan());
                        }),
                  ),
                  Container(
                    width: size.width,
                    height: 80,
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        IconButton(
                          icon: Icon(
                            Icons.home,
                            color: currentIndex == 0 ? Colors.white : Colors.grey.shade400,
                          ),
                          onPressed: () {
                            setBottomBarIndex(0);
                            Get.to(() => HomePage());
                          },
                          splashColor: Colors.white,
                        ),
                        IconButton(
                            icon: Icon(
                              Icons.backpack,
                              color: currentIndex == 1 ? Colors.white : Colors.grey.shade400,
                            ),
                            onPressed: () {
                              setBottomBarIndex(1);
                              Get.to(() => Orders());
                            }),
                        Container(
                          width: size.width * 0.20,
                        ),
                        IconButton(
                            icon: Icon(
                              Icons.delivery_dining,
                              color: currentIndex == 2 ? Colors.white : Colors.grey.shade400,
                            ),
                            onPressed: () {
                              setBottomBarIndex(2);
                              Get.to(() => Maps());
                            }),
                        IconButton(
                            icon: Icon(
                              Icons.person,
                              color: currentIndex == 3 ? Colors.white : Colors.grey.shade400,
                            ),
                            onPressed: () {
                              setBottomBarIndex(3);
                              Get.to(() => Profile());
                            }),
                      ],
                    ),
                  )
                ],
              ),
            ),
          ),

          if (isLoading)
            Container(
              color: Colors.black.withOpacity(0.5),
              child: Center(
                child: CircularProgressIndicator(
                  color: Colors.white,
                ),
              ),
            ),
        ],
      ),
    );
  }

}

class BNBCustomPainter extends CustomPainter {
  @override
  void paint(Canvas canvas, Size size) {
    Paint paint = new Paint()
      ..color = Colors.deepPurple
      ..style = PaintingStyle.fill;

    Path path = Path();
    path.moveTo(0, 20); // Start
    path.quadraticBezierTo(size.width * 0.20, 0, size.width * 0.35, 0);
    path.quadraticBezierTo(size.width * 0.40, 0, size.width * 0.40, 20);
    path.arcToPoint(Offset(size.width * 0.60, 20), radius: Radius.circular(20.0), clockwise: false);
    path.quadraticBezierTo(size.width * 0.60, 0, size.width * 0.65, 0);
    path.quadraticBezierTo(size.width * 0.80, 0, size.width, 20);
    path.lineTo(size.width, size.height);
    path.lineTo(0, size.height);
    path.lineTo(0, 20);
    canvas.drawShadow(path, Colors.black, 5, true);
    canvas.drawPath(path, paint);
  }

  @override
  bool shouldRepaint(CustomPainter oldDelegate) {
    return false;
  }
}
