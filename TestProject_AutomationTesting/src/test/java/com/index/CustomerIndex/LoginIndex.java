package com.index.CustomerIndex;

import com.indexPage.CustomerIndexPage.LoginIndexPage;
import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class LoginIndex extends BrowserConfiguration {

    @Test
    public void toVerifyCustomerCanLoginSuccessFully(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_Customer_001 :: To verify customer can login successfully.");

        performCustomerLogin();

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnSignOut();

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyCustomerCanSelectParkingSlot(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_Customer_002 :: To verify user can select the slot and book the parking slot successfully.");

        performCustomerLogin();

        loginIndexPage.selectLocation3();

        log("Verify user is redirected to \"Location's Page\"");
        if (loginVerification.verifyLocationPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        loginIndexPage.clickOnNextButton();
        log("Verify user received validation message to enter number plate.");
        if (loginVerification.verifyNumberPlateValidation()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        loginIndexPage.selectVehicleType();

        loginIndexPage.enterPlateNumber();
//        pause(1);

        loginIndexPage.clickOnNextButton();

        log("Verify user is redirected to \"Select Slot \" page");
        if (loginVerification.verifySelectSlotPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        loginIndexPage.selectStartDate();
//        pause(2);
        loginIndexPage.selectEndDate();
        loginIndexPage.selectTime();
        loginIndexPage.selectFloor();

        loginIndexPage.clickOnSubmitButton();

        pause(2);

        loginIndexPage.bookSlot();
            pause(2);
            loginIndexPage.clickOnBookButton();

//        if(loginIndexPage.isFloorBooked()){
//            loginIndexPage.bookSlot();
//            pause(2);
//            loginIndexPage.clickOnBookButton();
//            pause(2);
//        }else {
//            loginIndexPage.selectStartDate();
////            pause(2);
//            loginIndexPage.selectEndDate();
//            loginIndexPage.selectTime();
//            loginIndexPage.selectFloor();
//            loginIndexPage.clickOnSubmitButton();
//            loginIndexPage.bookSlot();
//            pause(2);
//            loginIndexPage.clickOnBookButton();
//        }

        log("Verify user is redirected to Confirmation Page.");
        if (loginVerification.verifySlotConfirmationPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        loginIndexPage.enterCardDetails();

        loginIndexPage.clickOnConfirmButton();

        log("Verify user has booked the slot successfully.");
        if (loginVerification.verifyUserLogInSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
