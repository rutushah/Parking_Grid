package com.initialization;

import com.github.javafaker.Faker;
import com.indexPage.AdminIndexPage.AdminDashboardIndexPage;
import com.indexPage.AdminIndexPage.AdminLoginIndexPage;
import com.indexPage.CustomerIndexPage.LoginIndexPage;
import com.indexPage.HomeIndexPage.HomeIndexPage;
import com.indexPage.HomeIndexPage.SelectRoleIndexPage;
import com.verification.AdminVerification.AdminDashboardVerification;
import com.verification.AdminVerification.AdminLoginVerification;
import com.verification.CustomerVerification.LoginVerification;
import com.verification.HomeVerification.HomeVerification;
import com.verification.HomeVerification.SelectVerification;
import org.apache.commons.io.FileUtils;
import org.openqa.selenium.*;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.interactions.Coordinates;
import org.openqa.selenium.interactions.Locatable;
import org.openqa.selenium.remote.Augmenter;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.testng.ITestContext;
import org.testng.ITestResult;
import org.testng.Reporter;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.BeforeMethod;

import java.io.File;
import java.lang.reflect.Method;
import java.util.List;
import java.util.Locale;
import java.util.concurrent.TimeUnit;

public class BrowserConfiguration {

    //----------Variable Declaration Section--------------
    public static WebDriver driver;
    public static String _methodName;
    protected static WebDriverWait wait;
    protected static int _logStep = 1;

    private static Faker faker = new Faker(new Locale("en-CA"));

    //-----------Class Object Definition---------------------
    protected HomeIndexPage homeIndexPage;
    protected HomeVerification homeVerification;
    protected SelectRoleIndexPage selectRoleIndexPage;
    protected SelectVerification selectVerification;
    protected AdminLoginIndexPage adminLoginIndexPage;
    protected AdminLoginVerification adminLoginVerification;
    protected AdminDashboardIndexPage adminDashboardIndexPage;
    protected AdminDashboardVerification adminDashboardVerification;

    //Customer Pages object creation
    protected LoginIndexPage loginIndexPage;
    protected LoginVerification loginVerification;

    //---------Method Definition Section------------------------

    @BeforeMethod(alwaysRun = true)
    public void setUp(Method method, ITestContext iTestContext) {

        DesiredCapabilities capability;

        _methodName = method.getName();

        String browser = iTestContext.getCurrentXmlTest().getParameter("browser");
        String url = "http://localhost/parkingGrid/home.php";

            System.setProperty("webdriver.chrome.driver", "chromedriver.exe");
            capability = DesiredCapabilities.chrome();
            capability.setBrowserName("chrome");
            capability.setJavascriptEnabled(true);
            ChromeOptions options = new ChromeOptions();
            options.addArguments("incognito");
            capability.setCapability(ChromeOptions.CAPABILITY, options);
            driver = new ChromeDriver(capability);

            homeIndexPage = new HomeIndexPage(driver);
            homeVerification = new HomeVerification(driver);
            selectRoleIndexPage = new SelectRoleIndexPage(driver);
            selectVerification = new SelectVerification(driver);
            adminLoginIndexPage = new AdminLoginIndexPage(driver);
            adminLoginVerification = new AdminLoginVerification(driver);
            adminDashboardIndexPage = new AdminDashboardIndexPage(driver);
            adminDashboardVerification = new AdminDashboardVerification(driver);

            //customer pages
            loginIndexPage = new LoginIndexPage(driver);
            loginVerification = new LoginVerification(driver);

            driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
            driver.manage().window().maximize();

            driver.get(url);

            setDriver(driver);
    }

    @AfterMethod(alwaysRun = true)
    public void tearDown(ITestResult testResult) {

        String testName;

        try {
            testName = testResult.getName();
            if (testResult.getStatus() == ITestResult.FAILURE) {

                System.out.println();
                System.out.println("TEST FAILED - " + testName);
                System.out.println();
                System.out.println("ERROR MESSAGE: " + testResult.getThrowable());
                System.out.println("\n");

                Reporter.setCurrentTestResult(testResult);
                String screenshotName = System.currentTimeMillis() + "_" + testName;

                WebDriver augmentedDriver = new Augmenter().augment(driver);
                File screenshot = ((TakesScreenshot) augmentedDriver).getScreenshotAs(OutputType.FILE);

                String nameWithExtension = screenshotName + ".png";

                String reportFolder = "test-output" + File.separator;
                String screenshotsFolder = "screenshots";
                File screenshotFolder = new File(reportFolder + screenshotsFolder);
                if (!screenshotFolder.getAbsoluteFile().exists()) {
                    screenshotFolder.mkdir();
                }
                FileUtils.copyFile(screenshot,
                        new File(screenshotFolder + File.separator + nameWithExtension).getAbsoluteFile());
                log("Step Failure<br>Please check attached screenshot : <br><br> " +
                        "<img src='../test-output/screenshots/" + nameWithExtension + "' width='683' height='384'/>");

            } else if ((testResult.getStatus() == ITestResult.SUCCESS)) {
                System.out.println("TEST PASSED - " + testName + "\n");
            } else if ((testResult.getStatus() == ITestResult.SKIP)) {
                System.out.println("TEST SKIPPED - " + testName + "\n");
            }

            driver.close();
            driver.quit();

        } catch (Exception throwable) {
            System.err.println("Exception ::\n" + throwable);
        }
    }

    public static void log(String message) {
        Reporter.log("<br>" + message + "<br>");
        System.out.println(message);
    }

    /**
     * To get text from the element
     *
     * @param element WebElement
     * @return Text from the WebElement
     */
    public static String getText(WebElement element) {
        //wait.until(ExpectedConditions.visibilityOfAllElements(element));
        return element.getText().trim();
    }

    public static int sizeOf(List list) {
        return list.size();
    }


    public static void pause(int seconds) {
        try {
            Thread.sleep(seconds * 1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    /**
     * To get text from the element
     *
     * @param element WebElement
     * @return Text from the WebElement
     */
    public static String getInnerText(WebElement element) {
        return element.getAttribute("innerText").trim();
    }

    public WebDriver getDriver() {
        return driver;
    }

    public static void switchToWindow(WebDriver driver) {
        for (String winHandle : driver.getWindowHandles()) {
            driver.switchTo().window(winHandle);
        }
    }

    public static void scrollElement(WebElement element) {
        Coordinates cor = ((Locatable) element).getCoordinates();
        cor.inViewPort();
        pause(2);
    }


    public void setDriver(WebDriver driver) {
        this.driver = driver;
    }

    /**
     * Highlight Element
     *
     * @param driver  WebDriver
     * @param element WebElement
     */
    public static void highlightElement(WebDriver driver, WebElement element) {
        /*
         * for (int i = 0; i < 2; i++) { JavascriptExecutor js = (JavascriptExecutor)
         * driver; js.executeScript("arguments[0].setAttribute('style', arguments[1]);",
         * element, "color: yellow; border: 2px solid yellow;");
         * js.executeScript("arguments[0].setAttribute('style', arguments[1]);",
         * element, ""); }
         */

        // draw a border around the found element

        ((JavascriptExecutor) driver).executeScript("arguments[0].style.border = '3px solid yellow'", element);
        pause(2);
    }

    public static void clickOnJS(WebDriver driver, WebElement element) {
        wait = new WebDriverWait(driver, 30);
        wait.until(ExpectedConditions.elementToBeClickable(element));
        JavascriptExecutor executor = (JavascriptExecutor) driver;
        executor.executeScript("arguments[0].click();", element);
    }

    /**
     * To get the random number from 10000 to 99999
     *
     * @return Random Number
     */
    public static int getRandomNumberBetween(int min, int max) {
        return faker.number().numberBetween(min, max);
    }



    /**
     *
     * Method to perform admin login
     * */
    public void performAdminLogin(){

        int numOfFailedSteps = 0;
        _logStep = 1;

        homeIndexPage.clickOnLoginButton();

        log("To verify user is redirected \"Select Role\" Page.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        pause(2);
        log("Verify user is redirected to Admin Login Page.");
        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("tapan@gmail.com","Tapan@123");
        adminLoginIndexPage.clickOnLoginButton();

        pause(1);

        adminLoginIndexPage.acceptAlert();

        log("Verify user is redirected to Admin Dashboard Successfully.");
        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

    }

    /**
     *
     * Method to perform customer login
     * */
    public void performCustomerLogin(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("To verify browser is logged successfully.");
        if (homeVerification.verifyHomePageIsVisible()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        homeIndexPage.clickOnLoginButton();
        log("Verify user redirected to \"Select Role\" Page.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnCustomer();
        selectRoleIndexPage.clickOnNextButton();

        log("Verify user redirected to customer page.");
        if (selectVerification.verifyUserRedirectedToCustomerLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("rutu@gmail.com", "Rutu@123");
        adminLoginIndexPage.clickOnLoginButton();

        log("Verify user has logged in to Parking Grid Succesfully.");
        if (loginVerification.verifyUserLogInSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        adminLoginIndexPage.acceptAlert();

    }

}
