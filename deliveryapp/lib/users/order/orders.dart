import 'package:flutter/material.dart';
import 'dart:convert';
import 'dart:async';
import 'dart:ui';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:deliveryapp/style/typo.dart';
import 'package:deliveryapp/style/color.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/users/profile/profile.dart';
import 'package:deliveryapp/users/order/manageOrder.dart';
import 'package:deliveryapp/users/home/home.dart';
import 'package:deliveryapp/users/maps/maps.dart';
import 'package:deliveryapp/users/qrscan/qrcode.dart';
import 'package:flutter/services.dart';
import 'package:flutter_barcode_scanner/flutter_barcode_scanner.dart';

import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:deliveryapp/api/api_connect.dart';
import 'package:deliveryapp/users/model/user.dart';

class Orders extends StatefulWidget {
  @override
  _OrdersState createState() => _OrdersState();
}

class _OrdersState extends State<Orders> {
  bool isLoading = true;
  int currentIndex = 1;
  List _dataList = [];

  @override
  void initState() {
    super.initState();
    getDashNow();
  }

  setBottomBarIndex(index) {
    setState(() {
      currentIndex = index;
    });
  }

  getDashNow() async {
    try {
      final SharedPreferences prefs = await SharedPreferences.getInstance();
      var res = await http.post(
        Uri.parse(API.getorders),
        body: {
          'user_id': prefs.getString("reg_id"),
        },
      );

      if (res.statusCode == 200) {
        var dataList = json.decode(res.body);
        setState(() {
          _dataList = dataList["userData"];
          isLoading = false;
        });
      } else {
        Fluttertoast.showToast(msg: 'Error..!');
      }
    } catch (e) {
      setState(() {
        isLoading = false;
      });
      // log(e.toString());
    }
  }



  @override
  Widget build(BuildContext context) {
    final Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        title: Text("Orders"),
        centerTitle: true,
        automaticallyImplyLeading: false,
        backgroundColor: Colors.deepPurple,
      ),
      backgroundColor: Colors.white,
      body: Stack(
        children: [
          isLoading ? Center(child: CircularProgressIndicator()) : Container(),
          Container(
            padding: EdgeInsets.symmetric(
              horizontal: 15,
              vertical: 15,
            ),
            child: Column(
              children: [

                Expanded(
                  child: ListView(
                    children: [
                      Container(
                        margin: EdgeInsets.only(
                          top: 10,
                          bottom: 20,
                        ),
                        child: Text(
                          'Today\'s Orders List',
                          style: TextStyle(
                            fontSize: 30,
                            fontWeight: FontWeight.w500,
                          ),
                        ),
                      ),

                      for(var data in _dataList)
                        Container(
                        margin: EdgeInsets.only(bottom: 10),
                          child: ListTile(
                          onTap: () {
                            Get.to(() => ManageOrder(myVariable: data["productid"]));
                          },
                          shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(20),
                          ),
                          contentPadding: EdgeInsets.symmetric(horizontal: 20, vertical: 5),
                          tileColor: Colors.deepPurple,
                          leading: Icon(
                              //todo.isDone ? Icons.check_box : Icons.check_box_outline_blank,
                              Icons.numbers,
                              color: white,
                          ),
                          title: Text(
                              data["productid"],
                              style: TextStyle(
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                              color: white,
                             // decoration: todo.isDone ? TextDecoration.lineThrough : null,
                              ),
                          ),
                          // trailing: Container(
                          //   padding: EdgeInsets.all(0),
                          //   margin: EdgeInsets.symmetric(vertical: 12),
                          //   height: 35,
                          //   width: 35,
                          //   decoration: BoxDecoration(
                          //     color: red,
                          //     borderRadius: BorderRadius.circular(5),
                          //   ),
                          //   child: IconButton(
                          //     color: Colors.white,
                          //     iconSize: 18,
                          //     icon: Icon(Icons.delete),
                          //     onPressed: () {
                          //      print('Clicked on delete icon');
                          //       //onDeleteItem(todo.id);
                          //     },
                          //   ),
                          // ),
                        ),
                      ),

                    ],
                  ),
                )
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
          )


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
