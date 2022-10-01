package com.indexPage.CustomerIndexPage;

import com.initialization.AbstractPage;
import com.verification.CustomerVerification.LoginVerification;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindAll;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.ui.Select;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import java.util.Random;

public class LoginIndexPage extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public LoginIndexPage(WebDriver driver) {
        super(driver);
    }

    //-----------------------------------Variable Declaration Section-----------------------------------------

    public static String _vehicleType = "";
    public static String _plateNumber = "";
    public static String _timeSelected = "";
    public static String _floorSelected = "";
    public static String _cardDetails = "4444222211118588";

    //-----------------------------------Locator's Definition Section-----------------------------------------


    @FindBy(xpath = "//img[@alt='Location 3']")
    private WebElement location3;

    @FindAll(value = {@FindBy(xpath = "//a[@class = 'loctionimga']")})
    private List<WebElement> lstLocations;

    @FindBy(xpath = "//button[@id='next']")
    private WebElement btnNext;

    @FindBy(xpath = "//select[@id='vehicle']")
    private WebElement selectVehicleType;

    @FindBy(xpath = "//input[@id='plateNumber']")
    private WebElement txtPlateNumber;

    @FindBy(xpath = "//input[@id='datepicker']")
    private WebElement txtStartDate;

    @FindBy(xpath = "//input[@id='datepicker2']")
    private WebElement txtEndDate;

    @FindBy(xpath = "//select[@id='time']")
    private WebElement selectTime;

    @FindBy(xpath = "//select[@id='floors']")
    private WebElement selectFloor;

    @FindBy(xpath = "//label[@id='disable_radio']")
    private WebElement slotDisabled;

    @FindAll(value = {@FindBy(xpath = "//div[@id='select_slot']//label")})
    private List<WebElement> lstAvailableSlots;

    @FindBy(xpath = "//input[@name='book']")
    private WebElement btnBook;

    @FindBy(xpath = "//button[@id='search']")
    private WebElement btnSubmit;

    @FindBy(xpath = "//input[@id='Card Number']")
    private WebElement txtCardNumber;

    @FindBy(xpath = "//button[@id='confirmation']")
    private WebElement btnConfirm;

    //-----------------------------------Method Definition Section--------------------------------------------

    public LoginVerification selectLocation3(){
        log("Step : " +_logStep++ + " Click on any location.");
        highlightElement(driver,location3);
//        location3.click();
        clickOnJS(driver,location3);
        return new LoginVerification(driver);
    }

    public LoginVerification  clickOnNextButton(){
        log("Step : " +_logStep++ + " Click on Next button.");
        highlightElement(driver,btnNext);
        btnNext.click();
        return new LoginVerification(driver);
    }

    public LoginVerification selectVehicleType(){
        log("Step : " +_logStep++ + " Select the vehicle type.");
        Select select = new Select(selectVehicleType);
        int index = getRandomNumberBetween(1, select.getOptions().size() - 1);

        select.selectByIndex(index);
        _vehicleType = getText(select.getFirstSelectedOption());
        log("Vehicle Type Selected :  " +  _vehicleType);
        return new LoginVerification(driver);
    }

    public LoginVerification enterPlateNumber(){
        log("Step : " +_logStep++ + " Enter Your Plate Number.");
        _plateNumber = String.valueOf(getRandomNumberBetween(000000,999999));
        log("Plate Number : " + _plateNumber);
        txtPlateNumber.sendKeys(_plateNumber);
        return new LoginVerification(driver);
    }

    public LoginVerification selectStartDate(){

        // Create object of SimpleDateFormat class and decide the format
        DateFormat dateFormat = new SimpleDateFormat("MM/dd/yyyy ");

        //get current date time with Date()
        Date date = new Date();

        // Now format the date
        String date1= dateFormat.format(date);

        log("Start Date : " + date1);
        txtStartDate.sendKeys(date1);

        return new LoginVerification(driver);
    }

    public LoginVerification selectEndDate(){

        // Create object of SimpleDateFormat class and decide the format
        DateFormat dateFormat = new SimpleDateFormat("MM/dd/yyyy ");

        //get current date time with Date()
        Date date = new Date();

        // Now format the date
        String date1= dateFormat.format(date);

        log("End Date : " + date1);
        txtEndDate.sendKeys(date1);

        return new LoginVerification(driver);
    }

    public LoginVerification selectTime(){
        log("Step : " +_logStep++ + " Select the time.");
        Select select = new Select(selectTime);
        int index = getRandomNumberBetween(1, select.getOptions().size() - 1);

        select.selectByIndex(index);
        _timeSelected = getText(select.getFirstSelectedOption());
        log("Time Selected :  " +  _timeSelected);
        return new LoginVerification(driver);
    }

    public LoginVerification selectFloor(){
        log("Step : " +_logStep++ + " Select the Floor.");
        Select select = new Select(selectFloor);
        int index = getRandomNumberBetween(1, select.getOptions().size() - 1);

        select.selectByIndex(index);
        _floorSelected = getText(select.getFirstSelectedOption());
        log("Floor Selected :  " +  _floorSelected);
        return new LoginVerification(driver);
    }

    public boolean isFloorBooked(){
        return !slotDisabled.isDisplayed();
    }

    public LoginVerification bookSlot(){
        Random random = new Random();
        int result = random.nextInt(lstAvailableSlots.size());
        scrollElement(lstAvailableSlots.get(result));
        clickOnJS(driver,lstAvailableSlots.get(result));
        return new LoginVerification(driver);
    }

    public LoginVerification clickOnBookButton(){
        log("Step : " +_logStep++ + " Click on Book button.");
        scrollElement(btnBook);
        highlightElement(driver,btnBook);
        clickOnJS(driver,btnBook);
        return new LoginVerification(driver);
    }

    public LoginVerification clickOnSubmitButton(){
        log("Step : " +_logStep++ + " Click on Submit button.");
        highlightElement(driver,btnSubmit);
        clickOnJS(driver,btnSubmit);
        return new LoginVerification(driver);
    }

    public LoginVerification enterCardDetails(){
        log("Step : " +_logStep++ + "Enter Card Number.");
        log("Card Number : " + _cardDetails);
        txtCardNumber.sendKeys(_cardDetails);
        return new LoginVerification(driver);
    }

    public LoginVerification clickOnConfirmButton(){
        log("Step : " +_logStep++ + " Click on Confirm button.");
        highlightElement(driver,btnConfirm);
        clickOnJS(driver,btnConfirm);
        return new LoginVerification(driver);
    }

}

