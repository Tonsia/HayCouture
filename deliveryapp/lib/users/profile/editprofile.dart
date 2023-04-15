import 'package:deliveryapp/users/maps/maps.dart';
import 'package:deliveryapp/users/order/orders.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:ui';
import 'dart:convert';
import 'package:deliveryapp/users/profile/profile.dart';
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

class EditProfile extends StatefulWidget {
  @override
  _EditProfileState createState() => _EditProfileState();
}

class _EditProfileState extends State<EditProfile> {
  RegExp nameregex = RegExp(r'^[a-zA-Z ]+$');
  RegExp emailregex = RegExp(r'^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$');
  RegExp phoneregex = RegExp(r'^[789]\d{9}$');

  RegExp licregex = RegExp(r'^[A-Z]{2}[0-9]+$');

  var emailController = TextEditingController();
  var mobController = TextEditingController();
  var nameController = TextEditingController();
  var addressController = TextEditingController();
  var licnoController = TextEditingController();



  var formKey = GlobalKey<FormState>();
  var isObsecure = true.obs;

  int currentIndex = 3;
  bool isLoading = false;
  var getResult = 'QR Code Result';
  var addr;
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

  updateInfo() async {
    print(emailController.text.trim());
    try {
      var res = await http.post(
        Uri.parse(API.updateinfo),
        body: {
          'email':emailController.text.trim(),
          'mob':mobController.text.trim(),
          'name':nameController.text.trim(),
          'address':addressController.text.trim(),
          'licno':licnoController.text.trim(),
          'id': deliid,
        },
      );

      if (res.statusCode == 200) {
        var result = jsonDecode(res.body);
        print(result);
        if (result['userData'] == true) {
          Fluttertoast.showToast(msg: 'Updated Successfully');
          Get.to(Profile());
        } else {
          Fluttertoast.showToast(msg: 'Error in login');
        }
      }
      else{
        Fluttertoast.showToast(msg: 'Error in logins');
      }
    } catch (e) {
      // log(e.toString());
    }
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
        addr = result["userData"];
        setState(() {
          name = addr["delname"].toString();
          nameController.text = addr["delname"].toString();
          addressController.text = addr["addr"].toString();
          deliid= addr["id"];
          emailController.text = addr["email"].toString();
          licnoController.text = addr["licno"].toString();
          mobController.text = addr["mob"].toString();
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

        title: Text("EditProfile"),
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
                                    Get.to(() => Profile());
                                  },
                                  icon: Icon(Icons.arrow_back,size: 30.0,)
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

                      ],
                    ),
                  ),
                  SizedBox(height: 16.0),

                  Padding(
                    padding: EdgeInsets.only(left: 16.0, right: 16.0),
                    child: SingleChildScrollView(
                      child: Form(
                        key: formKey,
                        child: Column(
                          children: [
                            //Name
                            TextFormField(
                              controller: nameController,
                              validator: (val) => !nameregex.hasMatch(val.toString())
                                  ? "Enter valid Name..!"
                                  : null,
                              decoration: InputDecoration(
                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                prefixIcon: const Icon(
                                  Icons.supervised_user_circle_sharp,
                                  color: Colors.black,
                                ),
                                hintText: "Name ...",
                                border: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.deepPurple,
                                  ),
                                ),
                                disabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.white,
                                  ),
                                ),
                                contentPadding:
                                const EdgeInsets.symmetric(
                                    horizontal: 14, vertical: 6),
                                fillColor: Colors.white,
                                filled: true,
                              ),
                            ),
                            const SizedBox(height: 18),

                            // email
                            TextFormField(
                              controller: emailController,
                              validator: (val) => !emailregex.hasMatch(val.toString())
                                  ? "Enter valid email address..!"
                                  : null,
                              decoration: InputDecoration(
                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                prefixIcon: const Icon(
                                  Icons.email,
                                  color: Colors.black,
                                ),
                                hintText: "Email ...",
                                border: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.deepPurple,
                                  ),
                                ),
                                disabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.white,
                                  ),
                                ),
                                contentPadding:
                                const EdgeInsets.symmetric(
                                    horizontal: 14, vertical: 6),
                                fillColor: Colors.white,
                                filled: true,
                              ),
                            ),
                            const SizedBox(height: 18),


                            //mobile
                            TextFormField(
                              controller: mobController,
                              validator: (val) => !phoneregex.hasMatch(val.toString())
                                  ? "Enter valid mobile number..!"
                                  : null,
                              decoration: InputDecoration(
                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                prefixIcon: const Icon(
                                  Icons.mobile_friendly,
                                  color: Colors.black,
                                ),
                                hintText: "Mobile Number",
                                border: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.deepPurple,
                                  ),
                                ),
                                disabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.white,
                                  ),
                                ),
                                contentPadding:
                                const EdgeInsets.symmetric(
                                    horizontal: 14, vertical: 6),
                                fillColor: Colors.white,
                                filled: true,
                              ),
                            ),
                            const SizedBox(height: 18),

                            // addr
                            TextFormField(
                              controller: addressController,
                              validator: (val) => val == ""
                                  ? "Enter valid Address..!"
                                  : null,
                              decoration: InputDecoration(
                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                prefixIcon: const Icon(
                                  Icons.home,
                                  color: Colors.black,
                                ),
                                hintText: "Address",
                                border: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.deepPurple,
                                  ),
                                ),
                                disabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.white,
                                  ),
                                ),
                                contentPadding:
                                const EdgeInsets.symmetric(
                                    horizontal: 14, vertical: 6),
                                fillColor: Colors.white,
                                filled: true,
                              ),
                            ),
                            const SizedBox(height: 18),

                            // licno
                            TextFormField(
                              controller: licnoController,
                              validator: (val) => !licregex.hasMatch(val.toString())
                                  ? "Enter valid license number"
                                  : null,
                              decoration: InputDecoration(
                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                prefixIcon: const Icon(
                                  Icons.supervised_user_circle,
                                  color: Colors.black,
                                ),
                                hintText: "License Number",
                                border: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.black,
                                  ),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.deepPurple,
                                  ),
                                ),
                                disabledBorder: OutlineInputBorder(
                                  borderRadius:
                                  BorderRadius.circular(10),
                                  borderSide: const BorderSide(
                                    color: Colors.white,
                                  ),
                                ),
                                contentPadding:
                                const EdgeInsets.symmetric(
                                    horizontal: 14, vertical: 6),
                                fillColor: Colors.white,
                                filled: true,
                              ),
                            ),
                            const SizedBox(height: 18),

                            // button input
                            Material(
                              color: Colors.deepPurple,
                              borderRadius: BorderRadius.circular(10),
                              child: InkWell(
                                onTap: () {

                                  if (formKey.currentState!
                                      .validate()) {
                                    updateInfo();
                                  }
                                },
                                borderRadius:
                                BorderRadius.circular(10),
                                child: const Padding(
                                  padding: EdgeInsets.symmetric(
                                    vertical: 14,
                                    horizontal: 80,
                                  ),
                                  child: Text(
                                    "Submit",
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontSize: 20,
                                    ),
                                  ),
                                ),
                              ),
                            )
                          ],
                        ),
                      ),
                    ),
                  )

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
      resizeToAvoidBottomInset: false,
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
