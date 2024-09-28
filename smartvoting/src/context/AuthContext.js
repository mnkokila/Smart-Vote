import axios from 'axios';
import React, { createContext, useState } from "react";
import { View, StyleSheet, ToastAndroid, Button, StatusBar } from "react-native";

import { BASE_URL } from "../config";
import AsyncStorage from '@react-native-async-storage/async-storage';

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
    
   const [userInfo, setUserInfo] = useState({});
   const [isLoading,setIsLoading] = useState(false);
   const [electionList,setElectionList] = useState({});
   const [candidateList,setCandidateList] = useState({});

    const login = (username,password) =>{
      setIsLoading(true);
      if(username=="" || password==""){
       //ToastAndroid.show("Please Enter Email and Password", ToastAndroid.SHORT);
       console.log("Please Enter Email and Password")
      }else{
       axios.post(`${BASE_URL}/login`,{
          username,password
         },{
          headers: {
            'Access-Control-Allow-Origin': '*'
          }
       }).then(res=>{
            let userInfo = res.data;
            console.log(userInfo);
            setUserInfo(userInfo)
            //AsyncStorage.setItem('userInfo',JSON.stringify(userInfo))
            AsyncStorage.setItem('userInfo',JSON.stringify(userInfo))
            
            setIsLoading(false)
         }).catch(e =>{
            console.log(`login error ${e}`);
            setIsLoading(false)
         })
      }
      
    };

    //register post..
    const register = (nic,email,password,membername) =>{
      setIsLoading(true);
      console.log(BASE_URL);
       axios.post(`${BASE_URL}/register`,{
        nic,email,password,membername
         },{
          headers: {
            'Access-Control-Allow-Origin': '*'
          }
       }).then(res=>{
        console.log(res.data)
            /*let userInfo = res.data;
            console.log(userInfo);
            setUserInfo(userInfo)
            AsyncStorage.setItem('userInfo',JSON.stringify(userInfo)) */
            //if(res.data.status==200){
              alert(res.data.message)
            //}

            
            setIsLoading(false)
         }).catch(e =>{
            console.log(`Registration error ${e}`);
            setIsLoading(false)
         })
      
      
    };


    const getElectionList = () =>{
      var nic = userInfo.nic;
      axios.get(`${BASE_URL}/available_elections`, {
          params: {
            nic: nic
          }
        })
        .then(function (response) {
            console.log(response);
            setElectionList(response.data);
        })
        .catch(function (error) {
            console.log(error);
        })
        .then(function () {
            // always executed ..
        });  
       
    }

    const getCandidateList = ()=>{
      setCandidateList = [];
    }

    const addVotes = () =>{

    }
    
    const logout = () => {
      setIsLoading(true);
      AsyncStorage.removeItem('userInfo');
      setUserInfo({});
      setIsLoading(false);
    };
  


    return (
      <AuthContext.Provider value={{ 
         userInfo,
         isLoading, 
         electionList,
         candidateList,
         login,
         register, 
         logout,
         getElectionList,
         getCandidateList,
         addVotes        
      }}>{children}</AuthContext.Provider>
    );
  };

