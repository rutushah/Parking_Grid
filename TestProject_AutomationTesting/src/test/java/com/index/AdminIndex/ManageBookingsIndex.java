package com.index.AdminIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class ManageBookingsIndex extends BrowserConfiguration {

    @Test
    public void toVerifyPageTitle(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageBookings_001 :: To verify the page title of Manage Bookings Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageBookings();

        log("Verify page title of manage bookings page.");
        if (adminDashboardVerification.verifyManageBookingsPageTitle()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyManageBookingsPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageBookings_002 :: To verify admin can see Manage Bookings Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageBookings();

        log("To verify admin can see elements and the data of the Manage bookings Page.");
        if (adminDashboardVerification.verifyManageBookingsPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyAdminRedirectedToDashboardFromManageBookings(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageBookings_003 :: To verify admin is redirected to Dashboard, when admin clicks on Go to Dashboard from Manage Bookings Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageBookings();

        log("To verify admin can see elements and the data of the Manage bookings Page.");
        if (adminDashboardVerification.verifyManageBookingsPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnGoToDashboard();

        log("Verify admin is redirected to Dashboard Page.");
        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
