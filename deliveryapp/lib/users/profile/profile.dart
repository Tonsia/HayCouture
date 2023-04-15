import 'package:deliveryapp/users/maps/maps.dart';
import 'package:deliveryapp/users/order/orders.dart';
import 'package:flutter/material.dart';
import 'package:deliveryapp/users/profile/editprofile.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:ui';
import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/users/home/home.dart';
import 'package:flutter/services.dart';
import 'package:deliveryapp/users/authentication/login_screen.dart';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:deliveryapp/api/api_connect.dart';
import 'package:deliveryapp/users/model/user.dart';

class Profile extends StatefulWidget {
  @override
  _ProfileState createState() => _ProfileState();
}

class _ProfileState extends State<Profile> {
  int currentIndex = 3;
  bool isLoading = false;
  var getResult = 'QR Code Result';
  var addr;
  var no;
  var name;
  var deliid;
  var email;
  var licno;
  var mob;
  var add;

  setBottomBarIndex(index) {
    setState(() {
      currentIndex = index;
    });
  }

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
      var res = await http.post(Uri.parse(API.getprofile), body: {
        'user_id': prefs.getString("reg_id") ?? "",
      });

      // print(res.body);
      if (res.statusCode == 200) {
        var result = jsonDecode(res.body);
        print(result);
        addr = result["userData"];

        setState(() {
          name = addr["delname"];
          add = addr["addr"];
          deliid= addr["delid"];
          email = addr["email"];
          licno = addr["licno"];
          mob = addr["mob"];
          no = result["userData1"];
        });

      } else {
        print(res.statusCode);
        Fluttertoast.showToast(msg: 'Error..!');
      }
    } catch (e) {
      // log(e.toString());
    } finally {
      setState(() {
        isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        title: Text("Profile"),
        centerTitle: true,
        automaticallyImplyLeading: true,
        backgroundColor: Colors.deepPurple,
      ),
      backgroundColor: Colors.white,
      body:
      Stack(
        children: [
          Center(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.start,
                children: [
                  Container(
                    height: 250,
                    decoration: BoxDecoration(
                      gradient: LinearGradient(
                        colors: [Colors.deepPurple, Colors.deepPurple.shade300],
                        begin: Alignment.centerLeft,
                        end: Alignment.centerRight,
                        stops: [0.5, 0.9],
                      ),
                    ),
                    child:

                    Column(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceAround,
                          children: <Widget>[
                            CircleAvatar(
                              backgroundColor: Colors.deepPurple.shade300,
                              minRadius: 35.0,
                              child:
                              IconButton(
                                  onPressed: () async {
                                    Get.to(() => HomePage());
                                  },
                                  icon: Icon(Icons.home,size: 30.0,)
                              ),
                            ),
                            CircleAvatar(
                              backgroundColor: Colors.white70,
                              minRadius: 60.0,
                              child: CircleAvatar(
                                radius: 50.0,
                                backgroundImage:
                                NetworkImage('https://avatars0.githubusercontent.com/u/28812093?s=460&u=06471c90e03cfd8ce2855d217d157c93060da490&v=4'),
                              ),
                            ),
                            CircleAvatar(
                              backgroundColor: Colors.deepPurple.shade300,
                              minRadius: 35.0,
                              child:
                              IconButton(
                                  onPressed: () async {
                                    Get.to(() => LoginScreen());
                                  },
                                  icon: Icon(Icons.logout_sharp,size: 30.0,)
                              ),
                            ),
                          ],
                        ),
                        SizedBox(
                          height: 10,
                        ),
                        Text(
                          name.toString()?? '',
                          style: TextStyle(
                            fontSize: 35,
                            fontWeight: FontWeight.bold,
                            color: Colors.white,
                          ),
                        ),
                        Text(
                          'ID - '+deliid.toString()?? 'ID',
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 25,
                          ),
                        ),
                      ],
                    ),
                  ),
                  Container(
                    child: Row(
                      children: <Widget>[
                        Expanded(
                          child: Container(
                            color: Colors.deepPurple.shade400,
                            child: ListTile(
                              title: Text(
                                no.toString()?? '',
                                textAlign: TextAlign.center,
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 30,
                                  color: Colors.white,
                                ),
                              ),
                              subtitle: Text(
                                'Orders',
                                textAlign: TextAlign.center,
                                style: TextStyle(
                                  fontSize: 20,
                                  color: Colors.white70,
                                ),
                              ),
                            ),
                          ),
                        ),

                      ],
                    ),
                  ),
                  Container(
                    child: Column(
                      children: <Widget>[
                        ListTile(
                          title: Text(
                            'Email',
                            style: TextStyle(
                              color: Colors.deepPurple,
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          subtitle: Text(
                            email.toString()?? '',
                            style: TextStyle(
                              fontSize: 18,
                            ),
                          ),
                        ),
                        Divider(),
                        ListTile(
                          title: Text(
                            'Mobile',
                            style: TextStyle(
                              color: Colors.deepPurple,
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          subtitle: Text(
                            mob.toString()?? '',
                            style: TextStyle(
                              fontSize: 18,
                            ),
                          ),
                        ),
                        Divider(),
                        ListTile(
                          title: Text(
                            'Address',
                            style: TextStyle(
                              color: Colors.deepPurple,
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          subtitle: Text(
                            add.toString()?? '',
                            style: TextStyle(
                              fontSize: 18,
                            ),
                          ),
                        ),
                        Divider(),
                        ListTile(
                          title: Text(
                            'License Number',
                            style: TextStyle(
                              color: Colors.deepPurple,
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          subtitle: Text(
                            licno.toString()?? '',
                            style: TextStyle(
                              fontSize: 18,
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              )
          ),
          // Positioned(
          //   bottom: 0,
          //   left: 0,
          //   child: Container(
          //     width: size.width,
          //     height: 80,
          //     child: Stack(
          //
          //       children: [
          //         CustomPaint(
          //           size: Size(size.width, 80),
          //           painter: BNBCustomPainter(),
          //         ),
          //         Center(
          //           heightFactor: 0.6,
          //           child: FloatingActionButton(backgroundColor: Colors.deepPurple, child: Icon(Icons.qr_code,color: Colors.white,), elevation: 0.1,
          //               onPressed: () {
          //                 //for Scanning Qr Code
          //
          //               }),
          //         ),
          //         Container(
          //           width: size.width,
          //           height: 80,
          //           child: Row(
          //             mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          //             children: [
          //               IconButton(
          //                 icon: Icon(
          //                   Icons.home,
          //                   color: currentIndex == 0 ? Colors.white : Colors.grey.shade400,
          //                 ),
          //                 onPressed: () {
          //                   setBottomBarIndex(0);
          //                   Get.to(() => HomePage());
          //                 },
          //                 splashColor: Colors.white,
          //               ),
          //               IconButton(
          //                   icon: Icon(
          //                     Icons.backpack,
          //                     color: currentIndex == 1 ? Colors.white : Colors.grey.shade400,
          //                   ),
          //                   onPressed: () {
          //                     setBottomBarIndex(1);
          //                     Get.to(() => Orders());
          //                   }),
          //               Container(
          //                 width: size.width * 0.20,
          //               ),
          //               IconButton(
          //                   icon: Icon(
          //                     Icons.delivery_dining,
          //                     color: currentIndex == 2 ? Colors.white : Colors.grey.shade400,
          //                   ),
          //                   onPressed: () {
          //                     setBottomBarIndex(2);
          //                     Get.to(() => Maps());
          //                   }),
          //               IconButton(
          //                   icon: Icon(
          //                     Icons.person,
          //                     color: currentIndex == 3 ? Colors.white : Colors.grey.shade400,
          //                   ),
          //                   onPressed: () {
          //                     setBottomBarIndex(3);
          //                     Get.to(() => Profile());
          //                   }),
          //             ],
          //           ),
          //         )
          //       ],
          //     ),
          //   ),
          // ),
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
