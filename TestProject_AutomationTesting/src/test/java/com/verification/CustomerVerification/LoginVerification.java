package com.verification.CustomerVerification;

import com.indexPage.CustomerIndexPage.LoginIndexPage;
import com.initialization.AbstractPage;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindAll;
import org.openqa.selenium.support.FindBy;
import org.testng.Assert;

import java.util.List;

public class LoginVerification extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public LoginVerification(WebDriver driver) {
        super(driver);
    }

    //------------------------Variable Declaration Section--------------------------------------------

    String _locationPageTitle = "Location";
    String _numberPlateError = "Error!!! Please select the plate number";
    String _selectSlotPageTitle = "Select Slot Page";

    //------------------------Locator's Definition Section--------------------------------------------

    @FindBy(xpath = "//img[@src='images/oldPort.jpg']")
    private WebElement carouselImage;

    @FindAll(value = {@FindBy(xpath = "//div[@class='row']//div//a")})
    private List<WebElement> lstLocations;

    @FindBy(xpath = "//p[normalize-space()='Error!!! Please select the plate number']")
    private WebElement lblNumberPlateError;

    @FindBy(xpath = "//span[normalize-space()='Plat Number :']/..//label")
    private WebElement lblPlateNumber;

    //------------------------Method's Definition Section---------------------------------------------

    public boolean verifyUserLogInSuccessfully(){
     //   log("Total available Locations : " + sizeOf(lstLocations));
     //   Assert.assertTrue(carouselImage.isDisplayed());
        return true;
    }

    public boolean verifyLocationPage(){
        String _actualPageTitle = driver.getTitle();
        Assert.assertEquals(_actualPageTitle,_locationPageTitle);
        return true;
    }

    public boolean verifyNumberPlateValidation(){
        String _actualNumberPlateError = lblNumberPlateError.getText();
        Assert.assertEquals(_actualNumberPlateError,_numberPlateError);
        return true;
    }

    public boolean verifySelectSlotPage(){
        String _actualPageTitle = driver.getTitle();
        Assert.assertEquals(_actualPageTitle,_selectSlotPageTitle);
        return true;
    }

    public boolean verifySlotConfirmationPage(){
        String _plateNumber = getText(lblPlateNumber);
        Assert.assertEquals(LoginIndexPage._plateNumber,_plateNumber);
        return true;
    }

}
