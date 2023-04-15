import 'package:flutter/material.dart';
import 'dart:convert';
import 'dart:ui';
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

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  bool isLoading = false;
  int currentIndex = 0;
  var getResult = 'QR Code Result';
  var cp = 0;
  var cd = 0;
  var ct = 0;
  var tp = 0;
  var td = 0;
  var tt = 0;

  @override
  void initState() {
    super.initState();
    getDashNow();
  }

  getDashNow() async {
    setState(() {
      isLoading = true;
    });
    try {
      final SharedPreferences prefs = await SharedPreferences.getInstance();
      var res = await http.post(
        Uri.parse(API.getdash),
        body: {
          'user_id': prefs.getString("reg_id"),
        },
      );

      if (res.statusCode == 200) {
        var result = jsonDecode(res.body);
        setState(() {
          cp = result["cp"];
          cd = result["cd"];
          ct = result["ct"];
          tp = result["tp"];
          td = result["td"];
          tt = result["tt"];
        });
      } else {
        Fluttertoast.showToast(msg: 'Error..!');
      }
    } catch (e) {
      // log(e.toString());
    }finally {
      setState(() {
        isLoading = false;
      });
    }
  }

  setBottomBarIndex(index) {
    setState(() {
      currentIndex = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    // getDashNow();
    return Scaffold(
      appBar: AppBar(
        title: Text("Home"),
        centerTitle: true,
        automaticallyImplyLeading: false,
        backgroundColor: Colors.deepPurple,
      ),
      backgroundColor: Colors.white,
      body: Stack(
        children: [
          /////////HOME PAGE//////////
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 0),
            child: Container(
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.all(
                  Radius.circular(0),
                ),
              ),
              child: Padding(
                padding: const EdgeInsets.all(20),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      'Today',
                      style: largePrimary,
                    ),
                    SizedBox(
                      height: 10,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Pending Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'No of orders remaining to deliver,',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          cp.toString(),
                          style: labelRedPrimary,
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 14,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Delivered Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'No of orders delivered today,',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          cd.toString(),
                          style: labelGreenPrimary,
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 14,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Total Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'Total no of orders today.',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          ct.toString(),
                          style: labelBluePrimary,
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 14,
                    ),
                    Text(
                      'Total Orders',
                      style: largePrimary,
                    ),
                    SizedBox(
                      height: 10,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Pending Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'No of orders remaining to deliver,',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          tp.toString(),
                          style: labelRedPrimary,
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 14,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Delivered Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'No of orders delivered today,',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          td.toString(),
                          style: labelGreenPrimary,
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 14,
                    ),
                    Row(
                      children: [

                        SizedBox(
                          width: 12,
                        ),
                        Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Text(
                              'Total Orders',
                              style: mainHeader,
                            ),
                            Text(
                              'Total no of orders today.',
                              style: paragraph,
                            ),
                          ],
                        ),
                        Spacer(),
                        Text(
                          tt.toString(),
                          style: labelBluePrimary,
                        ),
                      ],
                    ),

                  ],
                ),
              ),
            ),
          ),
          ///////////

          Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const SizedBox(height: 20.0,),
                  // Text(getResult),
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
          // Loading animation
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

  Future<int> scanQRCode() async {
    try{
      final qrCode = await FlutterBarcodeScanner.scanBarcode('#ff6666', 'Cancel', true, ScanMode.QR);

      if (!mounted) return 1;

      setState(() {
        getResult = qrCode;
      });
      // print("QRCode_Result:--");
      // print(qrCode);
      showCupertinoDialog(
          context: context,
          builder: (BuildContext ctx) {
            return CupertinoAlertDialog(
              title: const Text('Please Confirm'),
              content:  Text('Product ID - '+qrCode.toString()+'...Are you sure..?'),
              actions: [
                // The "Yes" button
                CupertinoDialogAction(
                  onPressed: () {
                    Navigator.of(context).pop();
                  },
                  child: const Text('Yes'),
                  isDefaultAction: true,
                  isDestructiveAction: true,
                ),

                // The "No" button
                CupertinoDialogAction(
                  onPressed: () {
                    Navigator.of(context).pop();
                  },
                  child: const Text('No'),
                  isDefaultAction: false,
                  isDestructiveAction: false,
                )
              ],
            );
          });
      return 1;
    } on PlatformException {
      getResult = 'Failed to scan QR Code.';
      return 1;
    }

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
