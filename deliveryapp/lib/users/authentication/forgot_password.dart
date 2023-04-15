import 'dart:convert';
import 'dart:math';
import 'dart:developer';
import 'dart:ui';


import 'package:flutter/src/material/colors.dart';
import 'package:deliveryapp/admin/admin_login.dart';
import 'package:deliveryapp/users/authentication/login_screen.dart';
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
class ForgotPassword extends StatefulWidget {
   const ForgotPassword({Key? key}) : super(key: key);

  @override
  State<ForgotPassword> createState() => _ForgotPasswordState();
}

class _ForgotPasswordState extends State<ForgotPassword> {
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

        if (result['success'] == true) {
          Fluttertoast.showToast(msg: 'Login Successfully');

          User userInfo = User.fromJson(result["userData"]);
          RememberUserPrefs.storeUserInfo(userInfo);
          //  Get.to(DashboardOfFragments())

          Future.delayed(const Duration(microseconds: 2000), () {
            Get.to(DashboardOfFragments());
          });
          // Get.to(SignupScreen());
        } else {
          Fluttertoast.showToast(msg: 'Error in login');
        }
      }
      else{
        Fluttertoast.showToast(msg: 'Error in login');
      }
    } catch (e) {
      // log(e.toString());
    }
  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(

        backgroundColor: Colors.white,
        appBar: AppBar(
          title: Text("Haycouture"),
          centerTitle: true,
          automaticallyImplyLeading: false,
        ),
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


                                  //login scrreb header
                                  Container(
                                      alignment: Alignment.center,
                                      padding: const EdgeInsets.all(30),
                                      child: const Text(
                                        'Forgot Password',
                                        style: TextStyle(
                                            color: Colors.white,
                                            fontWeight: FontWeight.w500,
                                            fontSize: 30),
                                      )),

                                  //login screen sign-in form

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
                                                "Send OTP",
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
                                  Row(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    children: [

                                      TextButton(
                                        onPressed: () {
                                          Get.to(LoginScreen());
                                        },
                                        child: const Text(
                                          "Back to login?",
                                          style: TextStyle(
                                            color: Colors.white,
                                            fontSize: 16,
                                          ),
                                        ),
                                      ),
                                    ],
                                  ),

                                ],
                              ),
                            )),
                      ),
                    ],
                  ),
                ),
              );
          },
        ));
  }
}
