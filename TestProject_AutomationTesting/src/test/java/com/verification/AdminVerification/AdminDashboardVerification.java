package com.verification.AdminVerification;

import com.initialization.AbstractPage;
import com.validations.AdminValidations;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindAll;
import org.openqa.selenium.support.FindBy;
import org.testng.Assert;

import java.util.List;

public class AdminDashboardVerification extends AbstractPage implements AdminValidations {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public AdminDashboardVerification(WebDriver driver) {
        super(driver);
    }

    //------------------------Variable Declaration Section--------------------------------------------

    String _pageTitle = "Admin Dashboard";
    String _manageBookingsPageTitle = "Manage Users";
    String _manageLocationsPageTitle = "Manage Locations";
    String _manageUsersPageTitle = "Manage Users";
    public static String _userName = "";
    String _userCannotLogin = "";

    //------------------------Locator's Definition Section--------------------------------------------

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[1]")})
    private List<WebElement> lstUsers;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[2]")})
    private List<WebElement> lstFirstName;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[3]")})
    private List<WebElement> lstLastName;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[4]")})
    private List<WebElement> lstTime;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[5]")})
    private List<WebElement> lstCarNo;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[6]")})
    private List<WebElement> lstEmail;

    @FindAll(value = {@FindBy(xpath = "//tbody/tr//td[7]")})
    private List<WebElement> lstContactNo;

    @FindBy(xpath = "//div[@class='container-fluid']")
    private WebElement adminHeader;

    @FindBy(xpath = "//form[@id='editForm']")
    private WebElement btnEditProfileForm;

    @FindBy(xpath = "//form[@name='location_floor_form']")
    private WebElement floorForm;

    @FindBy(xpath = "(//a)[6]")
    private WebElement btnView;

    @FindBy(xpath = "(//button[@id='block'])[1]")
    private WebElement btnBlock;
    //------------------------Method's Definition Section--------------------------------------------

    public boolean verifyDashboardPageTitle(){

        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_pageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifyManageUsersPage() {
        boolean bool = true;
        log("Total Registered Users for Parking Grid : " + sizeOf(lstUsers));

        for (int users = 0; users < sizeOf(lstUsers); users++) {
            log("\n <br> -------------Registered Users Details-----------------" +
                    "\n <br> FirstName : " + (lstFirstName.get(users).getText()) +
                    "\n <br> Last Name : " + (lstLastName.get(users).getText()));

            bool = bool && adminHeader.isDisplayed();
        }
        return bool;
    }

    public boolean verifyManageBookingsPage(){
        boolean bool = true;
        log("Total Booked Slots for Parking Grid : " + sizeOf(lstUsers));

        for (int users = 0; users < sizeOf(lstUsers); users++) {
            log("\n <br> -------------Registered Users Details-----------------" +
                    "\n <br> Place : " + (lstFirstName.get(users).getText()) +
                    "\n <br> Date : " + (lstLastName.get(users).getText()) +
                    "\n <br> Time : " + (lstTime.get(users).getText()) +
                    "\n <br> Car No : " + (lstCarNo.get(users).getText()));

            bool = bool && adminHeader.isDisplayed();
        }
        return bool;
    }

    public boolean verifyManageLocationPage(){
        boolean bool = true;
        log("Total Available Locations for Parking Grid : " + sizeOf(lstUsers));

        for (int users = 0; users < sizeOf(lstUsers); users++) {
            log("\n <br> -------------Registered Users Details-----------------" +
                    "\n <br> Available Location Name  : " + (lstFirstName.get(users).getText()));

            bool = bool && adminHeader.isDisplayed() && sizeOf(lstUsers) == 4;
        }
        return bool;
    }

    public boolean verifyEditProfilePage(){

        Assert.assertTrue(btnEditProfileForm.isDisplayed());
        return true;
    }

    public boolean verifyManageBookingsPageTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_manageBookingsPageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifyManageLocationsPageTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_manageLocationsPageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifyAvailableFloors(){
        Assert.assertTrue(floorForm.isDisplayed());
        return true;
    }

    public boolean verifyLocationBlockedSuccessfully(){
        Assert.assertTrue(btnView.isEnabled() == true);
        return true;
    }

    public boolean verifyLocationUnblockedSuccessfully(){
        Assert.assertTrue(btnView.isEnabled());
        return true;
    }

    public boolean verifyManageUserPageTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_manageUsersPageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifyUserBlockedSuccessfully(){
        _userName = lstFirstName.get(1).getTagName();
        Assert.assertTrue(btnBlock.isEnabled() == true);
        return true;
    }

    public boolean verifyUserCannotLogin(){
        _userCannotLogin = driver.switchTo().alert().getText();
        Assert.assertEquals(_userCannotLogin,USER_CANNOT_LOGIN);
        return true;
    }

    public boolean verifyUserUnblockedSucccessfully(){
        Assert.assertTrue(btnBlock.isEnabled());
        return true;
    }


}
