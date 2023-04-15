import 'dart:convert';
import 'dart:math';
import 'dart:developer';
import 'dart:ui';

import 'package:shared_preferences/shared_preferences.dart';
import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/users/home/home.dart';
import 'package:deliveryapp/users/authentication/forgot_password.dart';
import 'package:deliveryapp/users/fragments/dashboard_of_fragments.dart';
import 'package:deliveryapp/users/userPreferences/user_preferences.dart';
import 'package:flutter/material.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:get/get.dart';
import 'package:http/http.dart' as http;
import 'package:deliveryapp/api/api_connect.dart';
import 'package:deliveryapp/users/model/user.dart';
const Color red = const Color(0xFFFF0000);
const Color blue = const Color(0xFF0000FF);


class LoginScreen extends StatefulWidget {
  const LoginScreen({Key? key}) : super(key: key);

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  var formKey = GlobalKey<FormState>();
  var emailController = TextEditingController();
  var passwordController = TextEditingController();
  var isObsecure = true.obs;

  loginUserNow() async {
    try {
      var res = await http.post(
        Uri.parse(API.login),
        body: {
          'user_email': emailController.text.trim(),
          'user_password': passwordController.text.trim(),
        },
      );

      if (res.statusCode == 200) {
        var result = jsonDecode(res.body);
        print(result);
        if (result['success'] == true) {
          Fluttertoast.showToast(msg: 'Login Successfully');
          print(result["userData"]);
          // print(result["userData"]["reg_id"]);
          final SharedPreferences prefs = await SharedPreferences.getInstance();
          await prefs.setString("reg_id", result["userData"]["id"]);
          await prefs.setString("reg_name", result["userData"]["delname"]);
          await prefs.setString("mobile", result["userData"]["mob"]);
          Get.to(HomePage());
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
  Widget build(BuildContext context) {
    return WillPopScope(
      child:
        Scaffold(
          backgroundColor: Colors.white,
          // appBar: AppBar(
          //   title: Text("Haycouture"),
          //   centerTitle: true,
          //   automaticallyImplyLeading: false,
          // ),
          body: LayoutBuilder(
            builder: (context, cons) {
              return

                ConstrainedBox(

                  constraints: BoxConstraints(

                    minHeight: cons.maxHeight,
                  ),
                  child: SingleChildScrollView(
                    child: Column(

                      children: [

                        Padding(
                          padding: const EdgeInsets.all(0),
                          child: Container(
                              width: MediaQuery.of(context).size.width,
                              height: MediaQuery.of(context).size.height,
                              decoration: const BoxDecoration(
                                image: DecorationImage(
                                  image: AssetImage("images/back2.jpg"),
                                  fit: BoxFit.cover,
                                ),

                                color: Colors.blue,
                                borderRadius: BorderRadius.all(
                                  Radius.circular(0),
                                ),
                                boxShadow: [
                                  BoxShadow(
                                      blurRadius: 8,
                                      color: Colors.white,
                                      offset: Offset(0, -3)),
                                ],
                              ),
                              child: Padding(
                                padding: const EdgeInsets.fromLTRB(30, 30, 30, 8),
                                child: Column(
                                  children: [

                                    //this is our form with email password details
                                    const SizedBox(
                                      height: 50,
                                    ),

                                    Container(
                                        alignment: Alignment.center,
                                        padding: const EdgeInsets.all(10),
                                        child: const Text(
                                          'HAYCOUTURE',
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontWeight: FontWeight.w500,
                                              fontSize: 40),
                                        )),

                                    SizedBox(

                                      width: MediaQuery.of(context).size.width,
                                      height: 100,
                                      child: Image.asset("images/logohay.jpg"),
                                    ),
                                    //login scrreb header
                                    Container(
                                        alignment: Alignment.center,
                                        padding: const EdgeInsets.all(10),
                                        child: const Text(
                                          'Delivery Person',
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontWeight: FontWeight.w500,
                                              fontSize: 30),
                                        )),

                                    //login screen sign-in form
                                    Container(
                                        alignment: Alignment.center,
                                        padding: const EdgeInsets.all(20),
                                        child: const Text(
                                          'Sign In',
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontWeight: FontWeight.w500,
                                              fontSize: 24
                                          ),
                                        )),
                                    Form(
                                      key: formKey,
                                      child: Column(
                                        children: [

                                          //email
                                          TextFormField(
                                            controller: emailController,
                                            validator: (val) => val == ""
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
                                                  color: Colors.white,
                                                ),
                                              ),
                                              focusedBorder: OutlineInputBorder(
                                                borderRadius:
                                                BorderRadius.circular(10),
                                                borderSide: const BorderSide(
                                                  color: Colors.white,
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

                                          const SizedBox(
                                            height: 18,
                                          ),

                                          // for password text field

                                          Obx(
                                                () => TextFormField(
                                              controller: passwordController,
                                              obscureText: isObsecure.value,
                                              validator: (val) => val == ""
                                                  ? "Enter valid password..!"
                                                  : null,
                                              decoration: InputDecoration(
                                                errorStyle: TextStyle(color: Colors.red,fontSize: 14),
                                                prefixIcon: const Icon(
                                                  Icons.vpn_key_sharp,
                                                  color: Colors.black,
                                                ),
                                                suffixIcon: Obx(
                                                      () => GestureDetector(
                                                    onTap: () {
                                                      isObsecure.value =
                                                      !isObsecure.value;
                                                    },
                                                    child: Icon(
                                                      isObsecure.value
                                                          ? Icons.visibility_off
                                                          : Icons.visibility,
                                                      color: Colors.black,
                                                    ),
                                                  ),
                                                ),
                                                hintText: "Password ...",
                                                border: OutlineInputBorder(
                                                  borderRadius:
                                                  BorderRadius.circular(10),
                                                  borderSide: const BorderSide(
                                                    color: Colors.white,
                                                  ),
                                                ),
                                                enabledBorder: OutlineInputBorder(
                                                  borderRadius:
                                                  BorderRadius.circular(10),
                                                  borderSide: const BorderSide(
                                                    color: Colors.white,
                                                  ),
                                                ),
                                                focusedBorder: OutlineInputBorder(
                                                  borderRadius:
                                                  BorderRadius.circular(10),
                                                  borderSide: const BorderSide(
                                                    color: Colors.white,
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
                                                    horizontal: 14,
                                                    vertical: 6),
                                                fillColor: Colors.white,
                                                filled: true,
                                              ),
                                            ),
                                          ),

                                          const SizedBox(
                                            height: 18,
                                          ),

                                          // button input
                                          Material(
                                            color: Colors.black,
                                            borderRadius: BorderRadius.circular(10),
                                            child: InkWell(
                                              onTap: () {
                                                if (formKey.currentState!
                                                    .validate()) {
                                                  loginUserNow();
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
                                    const SizedBox(
                                      height: 7,
                                    ),
                                    // dont have account button form here
                                    // Row(
                                    //   mainAxisAlignment: MainAxisAlignment.center,
                                    //   children: [
                                    //
                                    //     TextButton(
                                    //       onPressed: () {
                                    //         Get.to(() => ForgotPassword());
                                    //         //Get.to(HomePage());
                                    //       },
                                    //       child: const Text(
                                    //         "Forgot Password?",
                                    //         style: TextStyle(
                                    //           color: Colors.white,
                                    //           fontSize: 16,
                                    //         ),
                                    //       ),
                                    //     ),
                                    //   ],
                                    // ),

                                  ],
                                ),
                              )),
                        ),
                      ],
                    ),
                  ),
                );
            },
          )),
      onWillPop: () async {
        return false;
      },
    );



  }
}
