import 'package:deliveryapp/users/home/home.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:location/location.dart';
import 'package:flutter/material.dart';
import 'dart:convert';
import 'dart:ui';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:deliveryapp/style/typo.dart';
import 'package:deliveryapp/style/color.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/users/profile/profile.dart';
import 'package:deliveryapp/users/order/verifydelivery.dart';
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

class ManageOrder extends StatefulWidget {

  final String myVariable;
  final String myVariable2='';
  ManageOrder({required this.myVariable});

  @override
  _ManageOrderState createState() => _ManageOrderState();
}

class _ManageOrderState extends State<ManageOrder> {

  int currentIndex = 1;

  bool isLoading = false;

  var firstValue = 0;
  var amt = 0;
  var thirdValue = '';
  var jmap;
  var amap;

  String _currentStatus = "Picked Up";

  void _onStatusChange(String status) {
    setState(() {
      _currentStatus = status;
    });
  }
  setBottomBarIndex(index) {
    setState(() {
      currentIndex = index;
    });
  }

  Future<void> getDashNow() async {
    setState(() {
      isLoading = true;
    });

    try {
      final SharedPreferences prefs = await SharedPreferences.getInstance();
      var res = await http.post(
        Uri.parse(API.getpstatus),
        body: {
          'pay_id': widget.myVariable,
        },
      );

      if (res.statusCode == 200) {
        var jsonMap = jsonDecode(res.body);
        print(jsonMap);
        setState(() {
          jmap = jsonMap["userData"];
          amap = jsonMap["address"];
        });

        if(amap[8]=='4'){
          _onStatusChange("Picked Up");
        }
        else if(amap[8]=="5"){
          _onStatusChange("In Transit");
        }else if(amap[8]=="6"){
          _onStatusChange("Delivered");
        }

      } else {
        Fluttertoast.showToast(msg: 'Error..!');
      }
    } catch (e) {
      // log(e.toString());
    }
    finally{
      setState(() {
        isLoading = false;
      });
    }
  }


  Future<void> update(a) async {

    try {


      var res = await http.post(
        Uri.parse(API.updatepstatus),
        body: {
          'sid': a.toString(),
          'pid' : jmap[0],
        },
      );


      if (res.statusCode == 200) {
        var respst = jsonDecode(res.body);
        if(respst['success']){
          Fluttertoast.showToast(msg: 'Status Successfully Updated..!');
        }
        print(respst['success']);
      } else {
        Fluttertoast.showToast(msg: 'Error..!');
      }
    } catch (e) {
      // log(e.toString());
    }

  }

  Future<void> pop() async {
    if(_currentStatus=="Picked Up"){
      update(4);
    }else if(_currentStatus=="In Transit"){
      update(5);
    }else if(_currentStatus=="Delivered"){
      Get.to(() => VerifyDelivery(myVariable: jmap[0],myVariable2: amap[0]));
    }

  }


  @override
  void initState() {
    super.initState();
    getDashNow();
  }

  Future<void> _launch(Uri url) async {
    await canLaunchUrl(url)
        ? await launchUrl(url)
        : Fluttertoast.showToast(msg: 'could_not_launch_this_app!');
  }

  @override
  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    //getDashNow();

    return Scaffold(
      appBar: AppBar(
        title: Text("Manage Order"),
        centerTitle: true,
        automaticallyImplyLeading: false,
        backgroundColor: Colors.deepPurple,
      ),
      backgroundColor: Colors.white,
      body: Stack(
        children: [
          Padding(
            padding: EdgeInsets.all(16),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [

                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children:  [
                          const Text(
                              "Product Code",
                              style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                            ),
                            Text(
                              jmap != null ? jmap[2] ?? "" : "",
                            style: TextStyle(fontSize: 16),
                          ),
                        const SizedBox(height: 16),
                        const Text(
                          "Total Amount:",
                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                        ),
                        Text(
                          jmap != null ? jmap[1]+"/-" ?? "" : "",
                          style: const TextStyle(fontSize: 16),
                        ),
                        const SizedBox(height: 16),
                        const Text(
                          "Payment Status",
                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                        ),
                        Text(
                          "Paid",
                          style: const TextStyle(fontSize: 16),
                        ),
                        const SizedBox(height: 16),
                        const Text(
                          "Delivery Status:",
                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                        ),
                        Text(
                          _currentStatus,
                          style: const TextStyle(fontSize: 16),
                        ),
                      ]
                    ),

                    SizedBox(width: 10),

                    Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const Text(
                            "Shipping Address",
                            style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                          ),
                          Text(
                            amap != null ? amap[1]+"\n"+amap[2]+"\n"+amap[5]+"\n"+amap[4]+"\n"+amap[3] ?? "" : "",
                            style: TextStyle(fontSize: 16),
                          ),
                        ]
                    ),

                  ],
                ),

                const SizedBox(height: 16),
                const Text(
                  "Contact :",
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 8),

                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Expanded(
                      child: GestureDetector(
                        onTap: () {
                          var phno = amap != null ? amap[7] ?? "" : "";
                          Uri phnno = Uri.parse('tel:'+ phno );
                          _launch(phnno);
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
                                  Icons.call,
                                  color: Colors.white,
                                ),
                                SizedBox(width: 8),
                                Text(
                                  "Call",
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
                        onTap: () async {
                          var place  = amap != null ? amap[6] ?? "" : "";

                          Location location = Location();

                          late bool _serviceEnabled;
                          late PermissionStatus _permissionGranted;
                          late LocationData _locationData;

                          _serviceEnabled = await location.serviceEnabled();
                          if (!_serviceEnabled) {
                            _serviceEnabled = await location.requestService();
                            if (!_serviceEnabled) {
                              return;
                            }
                          }

                          _permissionGranted = await location.hasPermission();
                          if (_permissionGranted == PermissionStatus.denied) {
                            _permissionGranted = await location.requestPermission();
                            if (_permissionGranted != PermissionStatus.granted) {
                              return;
                            }
                          }

                          _locationData = await location.getLocation();
                          Uri googleUrl = Uri.parse('https://www.google.com/maps/dir/'+_locationData.latitude.toString()+','+_locationData.longitude.toString()+'/'+place+'/');
                          _launch(googleUrl);

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
                                  Icons.directions,
                                  color: Colors.white,
                                ),
                                SizedBox(width: 8),
                                Text(
                                  "Direction",
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

                  ],
                ),
                const SizedBox(height: 16),

                const Text(
                  "Select Status:",
                  style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 8),
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Expanded(
                      child: GestureDetector(
                        onTap: () => _onStatusChange("Picked Up"),
                        child: Container(
                          decoration: BoxDecoration(
                            color: _currentStatus == "Picked Up"
                                ? Colors.deepPurple
                                : Colors.grey.shade200,
                            borderRadius: BorderRadius.circular(8),
                          ),
                          padding: EdgeInsets.all(16),
                          child: Center(
                            child: Text(
                              "Picked Up",
                              style: TextStyle(
                                  color: _currentStatus == "Picked Up"
                                      ? Colors.white
                                      : Colors.black),
                            ),
                          ),
                        ),
                      ),
                    ),
                    SizedBox(width: 16),
                    Expanded(
                      child: GestureDetector(
                        onTap: () => _onStatusChange("In Transit"),
                        child: Container(
                          decoration: BoxDecoration(
                            color: _currentStatus == "In Transit"
                                ? Colors.deepPurple
                                : Colors.grey.shade200,
                            borderRadius: BorderRadius.circular(8),
                          ),
                          padding: EdgeInsets.all(16),
                          child: Center(
                            child: Text(
                              "In Transit",
                              style: TextStyle(
                                  color: _currentStatus == "In Transit"
                                      ? Colors.white
                                      : Colors.black),
                            ),
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
                SizedBox(height: 16),
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Expanded(
                      child: GestureDetector(
                        onTap: () => _onStatusChange("Delivered"),
                        child: Container(
                          decoration: BoxDecoration(
                            color: _currentStatus == "Delivered"
                                ? Colors.deepPurple
                                : Colors.grey.shade200,
                            borderRadius: BorderRadius.circular(8),
                          ),
                          padding: EdgeInsets.all(16),
                          child: Center(
                            child: Text(
                              "Delivered",
                              style: TextStyle(
                                fontSize: 16,
                                  color: _currentStatus == "Delivered"
                                      ? Colors.white
                                      : Colors.black),
                            ),
                          ),
                        ),
                      ),
                    ),


                  ],
                ),
                SizedBox(height: 16),
                Center(
                  child: ElevatedButton(
                    onPressed: () {
                      pop();
                    },
                    style: ElevatedButton.styleFrom(

                      backgroundColor: Colors.deepPurple, // Set background color of button
                    ),
                    child: Text("Save Changes"),
                  ),
                ),
              ],
            ),
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
